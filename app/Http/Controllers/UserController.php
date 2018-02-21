<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use Session;
use App\Http\Requests;
use App\Barang;
use App\Stock_total;


class UserController extends Controller
{
    //
    public function getHalamanUtama(){
    	return view('utama');
    }
    public function getHalamanProfile(){
    	return view('user.user_profile');
    }

    public function  postHalamanProfile(Request $req){

    	$this->validate($req, [
            'email'     => 'email|required',
            'password'  => 'required|min:4'
         ]);


        if (Auth::attempt( ['email'=> $req->input('email'),'password'=>$req->input('password')] )   )
         {
             if (Session::has('oldUrl')){
                 $oldUrl = Session::get('oldUrl');
                 Session::forget('oldUrl');
                 return redirect()->to($oldUrl);
             }
             
             return redirect()->route('user.halaman_profile');//bila login sukses ke halaman profile
         }

         else{
         	$message = 'akun dan pasword tidak tepat atau akun tidak ada';
         	return redirect()->back()->with(['error_login_message'=> $message]);
         }

    }

    public function getLogout(){
        	Auth::logout();
            return redirect()->route('guest.home');
    }

    public function getTambahStock(){
            $barang = Barang::all();
        	return view('user.user_tambahstock')->with(['data_barang'=> $barang]);
    }

    public function getManajemenBarang(){
    	   return view('user.user_manajemen_barang');
    }

    public function postManajemenBarang(Request $req){
            $this->validate($req, [
            'kode_barang'     => 'required|min:14',
            'nama'            => 'required|min:4',
            'satuan'          => 'required',
            'banyak'          => 'numeric|required|min:1',
         ]);

         $barang = new Barang();
         $barang->kode_barang   = $req->input('kode_barang');
         $barang->nama_barang   = $req->input('nama');
         $barang->satuan_barang = $req->input('satuan');
         $barang->banyak_barang = $req->input('banyak');
         $barang->input_user    = Auth::user()->name;
         $barang->save();

         $stock = new Stock_total();
         $stock->kode_barang   = $req->input('kode_barang');
         $stock->nama_barang   = $req->input('nama');
         $stock->satuan_barang = $req->input('satuan');
         $stock->banyak_barang = $req->input('banyak');
         $stock->input_user    = Auth::user()->name;
         $stock->save();

         $message="Barang berhasil ditambahkan";

         return redirect()->back()->with(['message' => $message]);

    }

    public function postTambahStock(Request $req){
           $this->validate($req, [
            'banyak'          => 'numeric|required|min:1',
         ]);

            $id_barang = $req->get('kode_barang');
          

            $barang = Barang::find($id_barang);
            $stock = Stock_total::find($id_barang);

            $stock_lama= $barang->banyak_barang;
            $stock_baru= $req->banyak + $stock_lama ;

            $barang->banyak_barang= $stock_baru;
            $barang->save();

            $total_masuk_lama= $stock->total_masuk;
            $stock->total_masuk= $total_masuk_lama+$req->banyak;
            $stock->banyak_barang= $stock_baru;
            $stock->save();

            $semua_barang = Barang::all();
            $message="barang sudah ditambahkan";

            return redirect()->back()->with(['message' => $message, 'barang' => $semua_barang ]);    
    }

    public function postKurangiStock(Request $req){
          $this->validate($req, [
            'banyak'          => 'numeric|required|min:1',
         ]);

            $id_barang = $req->get('kode_barang');
            $barang = Barang::find($id_barang);

            $stock = Stock_total::find($id_barang);

            $stock_lama= $barang->banyak_barang;
            $stock_baru=  $stock_lama - $req->banyak ;
            if ($stock_baru >= 0 ) {
                $barang->banyak_barang= $stock_baru;
                $barang->save();

                $total_keluar_lama= $stock->total_keluar;
                $stock->total_keluar= $total_keluar_lama+ $req->banyak;
                $stock->banyak_barang = $stock_baru;
                $stock->save();

                $semua_barang = Barang::all();
                $message="barang sudah dikurangi";
                return redirect()->back()->with(['message' => $message, 'barang' => $semua_barang ]);
            }
            else{
                
                return redirect()->route('user.warning',['id_barang' => $id_barang, 'selisih' => $req->banyak]);
            }

    }

    public function getKurangiStock(){
            $barang= Barang::all();
            return view('user.user_kurangi_stock')->with(['data_barang'=> $barang]);
    }

    public function getHalamanWarning($barang_id,$selisih){

            $barang= Barang::find($barang_id);
            $stock = $barang->banyak_barang;
            return view('user.warning')->with(['stock'=> $stock, 'barang'=> $barang,'selisih' => $selisih]);
    }

    public function postKurangiFix($barang_id, $selisih){
            $barang= Barang::find($barang_id);
            $stock_sekarang = $barang->banyak_barang - $selisih;

            $barang->banyak_barang = $stock_sekarang;
            $barang->save();

            $stock = Stock_total::find($barang_id);
            $stock->banyak_barang = $stock_sekarang;
            $stock_lama= $stock->total_keluar;
            $stock->total_keluar = $stock_lama+$selisih;
            $stock->save();

            $message= "barang berhasil dikurangi";  
            return redirect()->route('user.kurangstock')->with(['message' => $message]);
    }

    public function getReporting(){
            $stock= Stock_total::all();
            return view ('user.reporting')->with(['data_barang'=> $stock]);
    }

}
