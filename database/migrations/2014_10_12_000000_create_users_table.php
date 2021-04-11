<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('name', 20)->null()->comment('ユーザー名');
            $table->string('postal_code', 7)->nullable()->comment('郵便番号');
            $table->string('prefecture', 20)->nullable()->comment('住所(都道府県)');
            $table->string('city', 20)->nullable()->comment('住所(市区町村)');
            $table->string('block', 20)->nullable()->comment('住所(番地)');
            $table->string('building', 20)->nullable()->comment('住所(建物名・部屋番号)');
            $table->string('phone', 11)->unique()->nullable()->comment('電話番号');
            $table->string('email', 254)->unique()->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment('パスワード');
            $table->rememberToken();
            $table->timestamp('updated_at')->useCurrent()->nullable()->comment('登録日時');
            $table->timestamp('created_at')->useCurrent()->nullable()->comment('更新日時');
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
