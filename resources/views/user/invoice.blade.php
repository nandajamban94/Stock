@extends('core.master')

@section('title')
        Reporting
@endsection


@section('content')

<h2>Reporting</h2>
 
 <hr>
<table class="table table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Kode Barang</th>
      <th>Nama </th>
      <th>Satuan </th>
      <th>Banyak </th>
      <th>Total Masuk</th>
      <th>Total Keluar</th>
      <th>Input User</th>
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
      <td>{{$brg->total_masuk}}</td>
      <td>{{$brg->total_keluar}}</td>
      <td>{{$brg->input_user}}</td>
      <td>{{$brg->created_at}}</td>
    </tr>
    @endforeach
  </tbody>

</table>
        
@endsection