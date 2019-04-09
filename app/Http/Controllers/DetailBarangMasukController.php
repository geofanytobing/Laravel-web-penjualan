<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\tbldetailbrgmasuk;

class DetailBarangMasukController extends Controller
{
    public function index(){
    	return view('detail-barang');
    }
    public function save(Request $r){
    	$detail = new tbldetailbrgmasuk;
    	$detail->no_nota = $r->input('no_nota');
    	$detail->kode_barang = $r->input('kode_barang');
    	$detail->jumlah = $r->input('jumlah');
    	$detail->sub_total = $r->input('sub_total');
    	$detail->save();

    	return redirect('detail-barang');
    }
    public function update(Request $r,$id){
    	$detail = tbldetailbrgmasuk::find($id);
    	$detail->no_nota = $r->no_nota;
    	$detail->kode_barang = $r->kode_barang;
    	$detail->jumlah = $r->jumlah;
    	$detail->sub_total = $r->sub_total;
    	$detail->save();

    	return redirect('detail-barang');
    }
    public function delete($id){
    	$detail = tbldetailbrgmasuk::find($id);
    	$detail->delete();
    	return redirect('detail-barang');
    }
}
