<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietHdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet_hds', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('ma_hd')->unsigned();
            $table->foreign('ma_hd')->references('id')->on('hoadons')->onDelete('cascade');
            $table->integer('soluong_sp');
            $table->string('giatien');
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
        Schema::dropIfExists('chitiet_hds');
    }
}
