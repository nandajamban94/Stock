<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'manajemen_brg';
    protected $fillable = ['kode_barang','nama_barang','satuan_barang','banyak_barang','input_user'];
}
