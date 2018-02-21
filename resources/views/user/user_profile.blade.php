@extends('core.master')

@section('title')
        Halaman User
@endsection

@include('partials.header')


@section('content')
<hr>
<a href="{{route('user.manajemenbarang')}}" type="button" class="btn btn-primary btn-lg btn-block">Manajemen Barang</a>
<a href="{{route('user.tambahstock')}}" type="button" class="btn btn-primary btn-lg btn-block">Tambah Barang</a>
<a href="{{route('user.kurangstock')}}" type="button" class="btn btn-primary btn-lg btn-block">Kurangi Barang</a>
<a href="{{route('user.reporting')}}" type="button" class="btn btn-primary btn-lg btn-block">Reporting Barang</a>
<hr>

@endsection