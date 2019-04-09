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

 public function update(Request $r,$id){
 	$bm = tblbrgmasuk::find($id);
 	$bm->no_nota = $r->no_nota;
 	$bm->tgl_masuk = $r->tgl_masuk;
 	$bm->id_distributor = $r->id_distributor;
 	$bm->id_petugas = $r->id_petugas;
 	$bm->total = $r->total;
 	$bm->save();

 	return redirect('barang-masuk');
 }

 public function delete($id){
 	$bm = tblbrgmasuk::find($id);
 	$bm->delete();
 	return redirect('barang-masuk');
 }
}
