<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('carts', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('item_id');
                $table->foreign('item_id')->references('id')->on('items');
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('carts');
    }
}
