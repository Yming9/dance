<?php

namespace App\Http\Controllers\Home;

use App\Models\Register;
use Illuminate\Http\Request;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;
use App\Models\Config;
use Endroid\QrCode\QrCode;

class AlipayController extends BaseController
{
    protected function aliConfig()
    {
        $config = Config::first();
         $parameter = [
            'app_id' => $config?$config->ali_appid:'',
            'notify_url' => url('home/alipay/notify'),
            'return_url' => url('home/alipay/payback'),
            'ali_public_key' => $config?$config->ali_public_key:'', // 加密方式： **RSA2**
            'private_key' => $config?$config->ali_private_key:'',
            'log' => [ // optional
                'file' => './logs/alipay.log',
                'level' => 'debug', // 建议生产环境等级调整为 info，开发环境为 debug
                'type' => 'single', // optional, 可选 daily.
                'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
            ],
            'http' => [ // optional
                'timeout' => 5.0,
                'connect_timeout' => 5.0,
                // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
            ],
            'mode' => 'dev', // optional,设置此参数，将进入沙箱模式
        ];

         return $parameter;
    }


    public function alipay($id)
    {
        $config = Config::first();
        $order = [
            'out_trade_no' => $id,
            'total_amount' => $config->money,
            'subject' => '舞蹈学院支付宝支付',
        ];
        $parameter = $this->aliConfig();
        $alipay = Pay::alipay($parameter)->scan($order);
        $alipay = json_decode($alipay,true);
        // laravel 框架中请直接 `return $alipay`
        $qr_code = $alipay['qr_code'];
        //根据$alipay['qr_code']生成二维码
        $qrCode = new QrCode($qr_code);
        header('Content-Type: '.$qrCode->getContentType());
        $qr = $qrCode->writeString();
        echo $qr;
    }

    public function payback()
    {
        $parameter = $this->aliConfig();
        $data = Pay::alipay($parameter)->verify(); // 是的，验签就这么简单！
        //如果支付成功。修改register中的be_pay ,pay_way.
        // 订单号：$data->out_trade_no// 支付宝交易号：$data->trade_no// 订单总金额：$data->total_amount
        $register = Register::find($data->out_trade_no);

        $register->be_pay = 1;//已支付
        $register->pay_way = 1;//支付宝
        if($register->save())
            return redirect('home/register/status')->withInput()->withSuccess('信息保存成功');
        return redirect('home/register/status')->withInput()->withErrors('信息保存失败');

    }

    public function notify()
    {
        $parameter = $this->aliConfig();
        $alipay = Pay::alipay($parameter);
        try{
            $data = $alipay->verify(); // 是的，验签就这么简单！

            // 请自行对 trade_status 进行判断及其它逻辑进行判断，在支付宝的业务通知中，
            //只有交易通知状态为 TRADE_SUCCESS 或 TRADE_FINISHED 时，支付宝才会认定为买家付款成功。
            // 1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号；
            // 2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额）；
            // 3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）；
            // 4、验证app_id是否为该商户本身。
            // 5、其它业务逻辑情况
            dd($data);

            Log::debug('Alipay notify', $data->all());

        } catch (\Exception $e) {
            $e->getMessage();
        }
        return $alipay->success();// laravel 框架中请直接 `return $alipay->success()`
    }


}
