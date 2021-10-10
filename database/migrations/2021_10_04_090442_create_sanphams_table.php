<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphams', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('maloai_sp')->unsigned();
            $table->foreign('maloai_sp')->references('id')->on('loaisanphams')->onDelete('cascade');
            $table->string('tensp');
            $table->string('gia_sp');
            $table->string('giamgia_sp')->nullable();
            $table->integer('soluong_sp')->nullable();
            $table->string('hinh_sp')->nullable();
            $table->string('donvi')->nullable();
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
        Schema::dropIfExists('sanphams');
    }
}
