<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\tbldetailpenjualan;

class DetailPenjualanController extends Controller
{
    public function index(){
    	return view('detail-penjualan');
    }
    public function save(Request $r){
    	$dp = new tbldetailpenjualan;
    	$dp->no_faktur = $r->input('no_faktur');
    	$dp->kode_barang = $r->input('kode_barang');
    	$dp->jumlah = $r->input('jumlah');
    	$dp->sub_total = $r->input('sub_total');

    	$dp->save();
    	return redirect('/detail-penjualan');
    }
    public function update(Request $r,$id){
    	$dp = tbldetailpenjualan::find($id);
    	$dp->no_faktur = $r->no_faktur;
    	$dp->kode_barang = $r->kode_barang;
    	$dp->jumlah = $r->jumlah;
    	$dp->sub_total = $r->sub_total;

    	$dp->save();
    	return redirect('/detail-penjualan'); 
    }
    public function delete($id){
    	$dp = tbldetailpenjualan::find($id);
    	$dp->delete();

    	return redirect('/detail-penjualan');
    }
}
