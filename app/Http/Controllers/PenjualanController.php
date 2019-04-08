<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\tblpenjualan;

class PenjualanController extends Controller
{
    public function index(){
    	return view('penjualan');
    }
}
