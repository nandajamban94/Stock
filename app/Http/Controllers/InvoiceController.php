<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use View;
use Auth;
use Session;
use App\Http\Requests;
use App\Barang;
use App\Stock_total;
use PDF;

class InvoiceController extends Controller
{
    public function generatePDF(Request $req ){
    	 $data_barang = Stock_total::all();
    	 $pdf = PDF::loadView('user.invoice',['data_barang'=> $data_barang]);
    	return $pdf->download('invoice.pdf');
    }
}
