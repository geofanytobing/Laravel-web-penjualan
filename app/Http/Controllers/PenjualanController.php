<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\tblpenjualan;

class PenjualanController extends Controller
{
    public function index(){
    	return view('penjualan');
    }
    public function save(Request $r){
    	$penjualan = new tblpenjualan;
    	$penjualan->no_faktur = $r->input('no_faktur');
    	$penjualan->tgl_penjualan = $r->input('tgl_penjualan');
    	$penjualan->id_petugas = $r->input('id_petugas');
    	$penjualan->bayar = $r->input('bayar');
    	$penjualan->sisa = $r->input('sisa');
    	$penjualan->total = $r->input('total');

    	$penjualan->save();
    	return redirect('/penjualan');
    }
    public function update(Request $r, $id){
    	$penjualan = tblpenjualan::find($id);
    	$penjualan->no_faktur = $r->no_faktur;
    	$penjualan->tgl_penjualan = $r->tgl_penjualan;
    	$penjualan->id_petugas = $r->id_petugas;
    	$penjualan->bayar = $r->bayar;
    	$penjualan->sisa = $r->sisa;
    	$penjualan->total = $r->total;

    	$penjualan->save();
    	return redirect('/penjualan');
    }
    public function delete($id){
    	$penjualan = tblpenjualan::find($id);
    	$penjualan->delete();

    	return redirect('/penjualan');
    }
}
