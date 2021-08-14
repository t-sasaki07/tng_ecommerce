<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('items', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name', 40)->comment('商品名');
                $table->text('price', 7)->comment('価格');
                $table->text('comment', 200)->comment('商品説明');
                $table->string('stock', 2)->comment('在庫');
                $table->string('img_1')->nullable()->comment('商品画像_1');
                $table->string('img_2')->nullable()->comment('商品画像_2');
                $table->string('img_3')->nullable()->comment('商品画像_3');
                $table->string('img_4')->nullable()->comment('商品画像_4');
                $table->string('sale')->nullable()->comment('割引率');
                $table->unsignedBigInteger('timesale_id')->nullable();
                // $table->foreign('timesale_id')
                //         ->references('id')
                //         ->on('timesale');
                $table->unsignedBigInteger('user_id')->nullable();
                $table->foreign('user_id')
                        ->references('id')
                        ->on('users');
                $table->unsignedBigInteger('admin_id')->nullable();
                $table->foreign('admin_id')
                        ->references('id')
                        ->on('admins');
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
        Schema::dropIfExists('items');
    }
}
