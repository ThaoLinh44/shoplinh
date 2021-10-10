<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNccSanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ncc_sanphams', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('ma_sp')->unsigned();
            $table->foreign('ma_sp')->references('id')->on('sanphams')->onDelete('cascade');
            $table->integer('ma_ncc')->unsigned();
            $table->foreign('ma_ncc')->references('id')->on('nhacungcaps')->onDelete('cascade');
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
        Schema::dropIfExists('ncc_sanphams');
    }
}
