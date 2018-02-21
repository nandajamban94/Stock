@extends('core.master')

@section('title')
        Halaman Peringatan
@endsection

@include('partials.header')


@section('content')

 <div class="row">
        <div class="alert alert-danger">
          Stock {{$barang->nama_barang}} sekarang ada {{$stock}} , jika stock dikurangi akan minus,
          	lanjutkan?
    </div>
    <form action="{{route('user.kurangifix',['barang_id' => $barang->id, 'selisih' => $selisih ])}}" method="post">
    	<button class="btn btn-default" ">Ya</button>
    	    <a class="btn btn-danger" href="{{route('user.kurangstock')}}"> Tidak</a>
		 {{ csrf_field() }}
	</form>
</div>

@endsection