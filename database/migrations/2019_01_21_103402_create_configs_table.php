<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('money')->comment('比赛需付的金额');
            $table->string('ali_appid')->comment('支付宝支付所需的appid');
            $table->string('ali_public_key')->comment('支付宝支付公钥');
            $table->string('sli_private_key')->comment('支付宝支付秘钥');
            $table->string('wechat_appid')->comment('微信支付所需的appid');
            $table->string('mch_id',11)->comment('微信支付所需的商户号');
            $table->string('wechat_private_key',64)->comment('微信支付所需的私钥');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
