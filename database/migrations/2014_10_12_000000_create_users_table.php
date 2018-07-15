<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')
                ->comment('主键 ID');
            $table->string('name')
                ->comment('用户名称');
            $table->string('email')
                ->unique('uk_email')
                ->comment('邮箱地址');
            $table->string('password')
                ->comment('密码');
            $table->rememberToken()
                ->comment('记住令牌');
            $table->timestamp('created_at')
                ->nullable()
                ->comment('创建时间');
            $table->timestamp('updated_at')
                ->nullable()
                ->comment('更新时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
