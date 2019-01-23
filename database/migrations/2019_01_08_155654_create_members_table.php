<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('password')->comment('用户登录密码');
            $table->string('avatar')->nullable()->comment('用户登录头像');
            $table->tinyInteger('sex')->default(1)->comment('用户性别;1-男;2-女;');
            $table->string('name')->comment('名字/机构联系人的名字');
            $table->string('agency')->nullable()->comment('机构的名称');
            $table->string('phone',13)->comment('用户手机号');
            $table->string('email',60)->nullable()->comment('邮箱号');
            $table->string('valid_card',32)->comment('有效的证件');
            $table->tinyInteger('sign_mode')->default(1)->comment('报名方式:1-个人;2-团体;');
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
        Schema::dropIfExists('members');
    }
}
