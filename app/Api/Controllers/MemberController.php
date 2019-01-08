<?php

namespace App\Api\Controllers;

use App\Api\Controllers\Common\ErrorCode;
use App\Api\Controllers\Common\WXBizDataCrypt;
use App\Models\Config;
use App\Models\Member;
use Dingo\Api\Http\Request;
use GuzzleHttp\Client;

class MemberController extends BaseController
{
    ## 获取获取用户信息
    public function oauth(Request $request)
    {
        $config = Config::first();
        $appid = $config->appid;
        $secret = $config->secret;
        if (empty($appid) || empty($secret)) {
            return [
                'code' => 403,
                '配置信息错误'
            ];
        }
        $url = 'https://api.weixin.qq.com/sns/jscode2session?';
        $url .= http_build_query([
            'appid' => $appid,
            'secret' => $secret,
            'js_code' => $request->get('code'),
            'grant_type' => 'authorization_code'
        ]);
        $client = new Client();
        $res = $client->request('get', $url);
        $userRes = $res->getBody()->getContents();
        $userRes = json_decode($userRes);
        $userRes = collect($userRes);

        ## 解密用户信息
        $sessionKey = $userRes->get('session_key');
        $encryptedData = $request->get('encryptedData');
        $iv = $request->get('iv');
        $pc = new WXBizDataCrypt($appid, $sessionKey);
        $errCode = $pc->decryptData($encryptedData, $iv, $data);
        if ($errCode != 0) {
            return [
                'code' => 403,
                'msg' => ErrorCode::errMessage($errCode)
            ];
        }
        $data = json_decode($data, true);
        $data = collect($data);
        if ($data->get('openId')) {
            $member = Member::where('openid', $data->get('openId'))->first();
            if (!$member) {
                $member = new Member();
                $member->openid = $data->get('openId');
                $member->unionid = $data->get('unionId');
                $member->nickname = $data->get('nickName');
                $member->avatar = $data->get('avatarUrl');
                $member->gender = $data->get('gender');
                $member->save();
            }
            return [
                'code' => 200,
                'msg' => '授权成功',
                'member_id' => $member->id
            ];
        }
        return [
            'code' => 403,
            'msg' => '授权失败'
        ];
    }

}