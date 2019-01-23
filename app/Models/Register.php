<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    public $sexText = [
        1=>'男',
        2=>'女'
    ];
    public $sexCss = [
        1=>'label-success',
        2=>'label-primary'
    ];

    public $signText = [
        1=>'个人',
        2=>'团体'
    ];
    public $signCss = [
        1=>'label-success',
        2=>'label-primary'
    ];

    public $masterText = [
        0=>'是',
        1=>'否'
    ];
    public $masterCss = [
        0=>'label-primary',
        1=>'label-success'
    ];

    public $statusText = [
        0=>'未通过',
        1=>'通过',
        2=>'审核中'
    ];
    public $statusCss = [
        0=>'label-danger',
        1=>'label-success',
        2=>'label-primary'
    ];

    public $payText = [
        0=>'否',
        1=>'是'
    ];
    public $payCss = [
        0=>'label-primary',
        1=>'label-success'
    ];

    public $wayText = [
        1=>'支付宝',
        2=>'微信'
    ];
    public $wayCss = [
        1=>'label-primary',
        2=>'label-success'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function cate()
    {
        return $this->belongsTo(Cate::class);
    }

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    //获取视频展示的路径
    public function videoUrl()
    {

    }
}
