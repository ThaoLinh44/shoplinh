<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNccGiohangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giohangs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('ma_user')->unsigned();
            $table->foreign('ma_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('ma_sp')->unsigned();
            $table->foreign('ma_sp')->references('id')->on('sanphams')->onDelete('cascade');
            $table->integer('soluong_sp');
            $table->string('thanhtien');
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
        Schema::dropIfExists('ncc_giohangs');
    }
}
