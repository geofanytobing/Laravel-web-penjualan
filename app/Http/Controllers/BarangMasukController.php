<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\tblbrgmasuk;

class BarangMasukController extends Controller
{
 public function index()
 {
 	return view('barang-masuk');
 }
 public function save(Request $r){
 	$barang_masuk = new tblbrgmasuk;
 	$barang_masuk->no_nota = $r->input('no_nota');
 	$barang_masuk->tgl_masuk = $r->input('tgl_masuk');
 	$barang_masuk->id_distributor = $r->input('id_distributor');		
 	$barang_masuk->id_petugas = $r->input('id_petugas');
 	$barang_masuk->total = $r->input('total');
 	$barang_masuk->save();

 	return redirect('barang-masuk');

 }
}
