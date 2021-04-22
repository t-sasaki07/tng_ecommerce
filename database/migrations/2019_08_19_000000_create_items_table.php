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
        if(!Schema::hasTable('items')){
            Schema::create('items', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->text('price');
                $table->text('comment');
                $table->string('stock');
                $table->string('time_sale');
                $table->bigIncrements('user_id');
                $table->bigIncrements('seller_id');
                $table->timestamp('failed_at')->useCurrent();
            });
        }
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
