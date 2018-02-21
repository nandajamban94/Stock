@extends('core.master')

@section('title')
        Tambah Stock
@endsection

@include('partials.header')


@section('content')
<hr>
@include('partials.notif')
<div class="panel panel-default">
  <div class="panel-heading">Input Barang Baru</div>

  <div class="panel-body">
    <form action="{{route('user.tambahbarang')}}" method="post">
       <div class="form-group">
      <label> Kode Barang  </label>
         <input type="text" class="form-control" id="kode_barang" placeholder="" name="kode_barang">
      </div>
      <div class="form-group">
      <label> Nama  </label>
         <input type="text" class="form-control" id="nama" placeholder="" name="nama">
      </div>

      <div class="form-group">
      <label> Satuan  </label>
         <input type="text" class="form-control" id="satuan" placeholder="" name="satuan">
      </div>

      <div class="form-group">
      <label> Banyak  </label>
         <input type="text" class="form-control" id="banyak" placeholder="" name="banyak">
      </div>
    
      <button type="submit" class="btn btn-default">Tambah </button>
      {{ csrf_field() }}
 </form>
   
  </div>
</div>

 
 
        
@endsection