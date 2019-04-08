<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\tblpetugas;


class PetugasController extends Controller
{
    public function index(){
    	return view('petugas');
    }

    public function save(Request $r){
    	$petugas = new tblpetugas;
    	$petugas->id_petugas = $r->input('id_petugas');
    	$petugas->nama_petugas = $r->input('nama_petugas');
    	$petugas->alamat = $r->input('alamat');
    	$petugas->email = $r->input('email');
    	$petugas->telepon = $r->input('telepon');
    	$petugas->save();
    	return redirect('/petugas');
    }

    public function update(Request $r, $id){
    	$petugas = \App\tblpetugas::find($id);
    	$petugas->id_petugas = $r->id_petugas;
    	$petugas->nama_petugas = $r->nama_petugas;
    	$petugas->alamat = $r->alamat;
    	$petugas->email = $r->email;
    	$petugas->telepon = $r->telepon;
    	$petugas->save();
    	return redirect('/petugas');
    }
    public function delete($id){
    	$petugas = tblpetugas::find($id);
    	$petugas->delete();
    	return redirect('/petugas');
    }
}
