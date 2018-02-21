@extends('core.master')

@section('title')
        Tambah Stock
@endsection

@include('partials.header')


@section('content')

@include('partials.notif')
<hr>

<div class="panel panel-default">
  <div class="panel-heading">Tambah Stock</div>

  <div class="panel-body">
    <form action="{{route('user.post_tambahstock')}}" method="post">
       <div class="form-group">
      <label> Kode Barang  </label>
         <select class="form-control" name="kode_barang">
          @foreach($data_barang as $b)
          <option value="{!! $b->id !!}">{{$b->kode_barang}} {{$b->nama_barang}}</option>
          @endforeach
         </select>
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

 
 <hr>
<table class="table table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Kode Barang</th>
      <th>Nama </th>
      <th>Satuan </th>
      <th>Banyak </th>
      <th>User yang input</th>
      <th>Tanggal masuk</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data_barang as $brg)
    <tr>
      <td>{{$brg->id}}</td>
      <td>{{$brg->kode_barang}}</td>
      <td>{{$brg->nama_barang}}</td>
      <td>{{$brg->satuan_barang}}</td>
      <td>{{$brg->banyak_barang}}</td>
      <td>{{$brg->input_user}}</td>
      <td>{{$brg->created_at}}</td>
    </tr>
    @endforeach
  </tbody>

</table>
        
@endsection