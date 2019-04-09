<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\tbljenis;

class JenisController extends Controller
{
    public function index(){
    	return view('jenis');
    }

    public function save(Request $r){
    	$jenis = new tbljenis;
    	$jenis->kode_jenis = $r->input('kode_jenis');
    	$jenis->jenis = $r->input('jenis');
    	$jenis->save();

    	return redirect('/jenis');
    }
    public function update(Request $r,$id){
    	$jenis = tbljenis::find($id);
    	$jenis->kode_jenis = $r->kode_jenis;
    	$jenis->jenis = $r->jenis;
    	$jenis->save();

    	return redirect('/jenis');
    }
    public function delete($id){
    	$jenis = tbljenis::find($id);
    	$jenis->delete();

    	return redirect('/jenis');
    }
}
