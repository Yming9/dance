<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->comment('用户ID');
            $table->integer('zone_id')->comment('赛区ID');
            $table->integer('cate_id')->comment('类别ID');
            $table->integer('race_id')->comment('舞种ID');
            $table->string('name')->comment('名字');
            $table->string('age',32)->comment('年龄');
            $table->tinyInteger('sex')->default(1)->comment('性别;1-男;2-女;');
            $table->string('valid_card',60)->comment('有效证件');
            $table->string('phone',15)->comment('联系电话');
            $table->string('email',32)->comment('邮箱');
            $table->tinyInteger('sign_mode')->default(1)->comment('报名方式;1-个人;2-团队;');
            $table->longText('team_msg')->nullable()->comment('团队信息');
            $table->string('works')->nullable()->comment('作品信息');
            $table->tinyInteger('be_master')->default(0)->comment('时候报名大师课程;0-不报名;1-报名;');
            $table->tinyInteger('status')->default(0)->comment('报名的装填;0-未通过审核;1-通过审核;2-审核中');
            $table->tinyInteger('be_pay')->default(0)->comment('是否支付；0：未支付；1：已支付');
            $table->tinyInteger('pay_way')->comment('支付方式;1:支付宝;2:微信;');
            $table->timestamp('signed_at')->comment('报名时间');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registers');
    }
}
