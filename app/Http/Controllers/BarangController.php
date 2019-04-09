<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tblbarang;

class BarangController extends Controller
{

	public function index (){
		return view('barang');
	}
    public function save (Request $r){
    	$barang = new tblbarang;
    	$barang->kode_barang = $r->input('kode_barang');
    	$barang->nama_barang = $r->input('nama_barang');
        $barang->kode_jenis = $r->input('kode_jenis');
    	$barang->harga_net = $r->input('harga_net');
    	$barang->harga_jual = $r->input('harga_jual');
    	$barang->stok = $r->input('stok');
    	$barang->save();

    	return redirect('/barang');

    }

    public function delete($id){
    	$barang = tblbarang::find($id);
    	$barang->delete();

    	return redirect('/barang');
    }

    public function update(Request $r, $id){
    	$barang = \App\tblbarang::find($id);
    	$barang->kode_barang = $r->kode_barang;
    	$barang->nama_barang = $r->nama_barang;
        $barang->kode_jenis = $r->kode_jenis;
    	$barang->harga_net = $r->harga_net;
    	$barang->harga_jual = $r->harga_jual;
    	$barang->stok = $r->stok;
    	$barang->save();

    	return redirect('/barang');
    }
}
