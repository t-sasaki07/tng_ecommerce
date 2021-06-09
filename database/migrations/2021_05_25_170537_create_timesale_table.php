<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timesale', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('start')->comment('開始時間');
            $table->time('finish')->comment('終了時間');
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
        Schema::dropIfExists('timesall');
    }
}
