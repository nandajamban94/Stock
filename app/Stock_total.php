<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_total extends Model
{
     protected $table = 'stock_barang';
     protected $fillable = ['kode_barang','nama_barang','satuan_barang','banyak_barang','total_masuk','total_keluar','input_user'];
}
