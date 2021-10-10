<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNccHoadonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadons', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('ma_user')->unsigned();
            $table->foreign('ma_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('trangthai_hd');
            $table->string('hinhthucthanhtoan');
            $table->string('ten_kh');
            $table->string('diachi_kh');
            $table->string('sdt_kh');
            $table->string('ghichu_kh');
            $table->string('tongtien_hd');
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
        Schema::dropIfExists('ncc_hoadons');
    }
}
