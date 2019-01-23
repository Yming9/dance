<?php

namespace App\Http\Controllers\Home;

use App\Models\Register;
use Illuminate\Http\Request;
use App\Models\Config;
use Carbon\Carbon;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Endroid\QrCode\QrCode;

class WechatpayController extends BaseController
{

    //微信支付
    public function wechatpay($id)
    {
        ## 统一下单
        $config = Config::first();
        $options = [
            'app_id' => $config->wechat_appid,
            'payment' => [
                'merchant_id' => $config->mch_id,
                'key' => $config->wechat_private_key,
                'cert_path' => 'path/to/your/cert.pem', // XXX: 绝对路径！！！！
                'key_path' => 'path/to/your/key',      // XXX: 绝对路径！！！！
                'notify_url' => url('home/wechat/payback'),       // 你也可以在下单时单独设置来想覆盖它
            ],
        ];
        $app = new Application($options);
        $payment = $app->payment;
        $attributes = [
            'trade_type' => 'APP', // JSAPI，NATIVE，APP...
            'body' => '报名微信支付',
            'detail' => '报名微信支付',
            'out_trade_no' => $id,
            'total_fee' => '10', // 单位：分
            //'notify_url' =>  url('order/pay_callback'), // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            //'openid' => '', // trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识，
            // ...
        ];
        //根据$result->url生成二维码
       /* $qrCode = new QrCode('www.baidu.com');
        header('Content-Type: '.$qrCode->getContentType());
        $qr = $qrCode->writeString();
        echo $qr;*/

        $order = new Order($attributes);
        $result = $payment->prepare($order);
        dd($result);
        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS') {

            //根据$result->url生成二维码
            $qrCode = new QrCode($result->url);
            header('Content-Type: '.$qrCode->getContentType());
            $qr = $qrCode->writeString();
           /* $prepayId = $result->prepay_id;
            ## 生成支付参数
            $jssdk = $payment->configForJSSDKPayment($prepayId); // 返回数组*/

        }else{
            return back()->withInput()->withErrors('生成二维码失败');
        }



    }

    public function payback(Request $request)
    {
        $config = Config::first();
        $options = [
            'app_id' => $config->wechat_appid,
            'payment' => [
                'merchant_id' => $config->mch_id,
                'key' => $config->wechat_private_key,
                'cert_path' => 'path/to/your/cert.pem', // XXX: 绝对路径！！！！
                'key_path' => 'path/to/your/key',      // XXX: 绝对路径！！！！
                'notify_url' => url('home/wechat/payback'),       // 你也可以在下单时单独设置来想覆盖它
            ],
        ];

        $app = new Application($options);
        $response = $app->payment->handleNotify(function ($notify, $successful) {
            $registerId = $notify->out_trade_no;
            $register  = Register::where('id','=',$registerId)->first();
            // 检查订单是否已经更新过支付状态
            if ($register->be_pay) {
                return true;
            }

            // 用户是否支付成功
            if ($successful) {

                DB::beginTransaction();
                $register->be_pay = 1; // 是否支付的状态
                $register->pay_way = 2; // 支付方式：微信

                try {
                    $register->save();
                } catch (\Exception $e) {
                    DB::rollback();
                    Log::info($e);
                    return redirect('')->withErrors('修改支付状态失败');
                }

            }
            return redirect('')->withErrors('支付失败');
        });
        //  $response->send(); // Laravel 里请使用：return $response;
        return $response; // Laravel 里请使用：return $response;
    }
}
