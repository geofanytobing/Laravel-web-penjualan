<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbldistributor;

class DistributorController extends Controller
{
    public function index (){
    	return view ('distributor');
    }
    public function save(Request $r){
    	$distributor = new tbldistributor;
    	$distributor->id_distributor = $r->input('id_distributor');
    	$distributor->nama_distributor = $r->input('nama_distributor');
    	$distributor->alamat = $r->input('alamat');
    	$distributor->kota_asal = $r->input('kota_asal');
    	$distributor->email = $r->input('email');
    	$distributor->telepon = $r->input('telepon');
    	$distributor->save();

    	return redirect('/distributor');

    }

    public function update(Request $r, $id){
    	$distributor = tbldistributor::find($id);
    	$distributor->id_distributor = $r->id_distributor;
    	$distributor->nama_distributor = $r->nama_distributor;
    	$distributor->alamat = $r->alamat;
    	$distributor->email = $r->email;
    	$distributor->telepon = $r->telepon;
    	$distributor->save();

    	return redirect('/distributor');
    }
    public function delete($id)
    {
    	$distributor = tbldistributor::find($id);
    	$distributor->delete();
    	return redirect('/distributor');
    }
}
