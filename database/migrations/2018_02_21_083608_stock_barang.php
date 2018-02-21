<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StockBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('stock_barang', function (Blueprint $table) {
            $table->increments('id'); //-ini kode_barang 
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('satuan_barang');
            $table->string('banyak_barang');
            $table->integer('total_masuk');
            $table->integer('total_keluar');
            $table->string('input_user');
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
        //
    }
}
