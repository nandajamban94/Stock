<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ManajemenBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('manajemen_brg', function (Blueprint $table) {
            $table->increments('id'); //-ini kode_barang 
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('satuan_barang');
            $table->integer('banyak_barang');
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
