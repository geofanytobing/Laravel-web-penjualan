@extends('layouts.layouts-admin')
@section('content')
 <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <center>
    	<!-- Button trigger modal -->
 <a href="#modal-default"class="btn btn-warning" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus"></i>
              </a>

<!-- Modal -->
<?php

    $petugas = \App\tblpetugas::all();

?>
 <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
              	<form action="{{url('penjualan/save')}}" method="POST">
                  @csrf
                 <div class="form-group">
                  <label>Nomor Faktur</label>
                  <input type="number" class="form-control" name="no_faktur">
                </div>

 <div class="form-group">
                  <label>Tanggal Penjualan</label>
                  <input type="date" class="form-control" placeholder="" name="tgl_penjualan">
                </div>	                
                 <div class="form-group">
                  <label>ID Petugas</label>
                  <select class="form-control" name="id_petugas">
                    @foreach($petugas as $p)
                  	<option>{{$p->id_petugas}}</option>
                    @endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label>Bayar</label>
                  <input type="number" class="form-control" name="bayar">
                </div>
                 <div class="form-group">
                  <label>Sisa</label>
                  <input type="number" class="form-control" name="sisa">
                </div>

                 <div class="form-group">
                  <label>Total</label>
                  <input type="number" class="form-control" placeholder="" name="total">
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      
    </center>
    <br>
<table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr>
                <th>Nomor Faktur</th>
                <th>Tanggal Penjualan</th>
                <th>ID Petugas</th>
                <th>Bayar</th>
                <th>Sisa</th>
                <th>Total</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
            $penjualan = \App\tblpenjualan::all();
            $petugas = \App\tblpetugas::all();
          ?>
          @foreach($penjualan as $p)
            <tr>
                <td>{{$p->no_faktur}}</td>
                <td>{{$p->tgl_penjualan}}</td>
                <td>{{$p->id_petugas}}</td>
                <td>{{$p->bayar}}</td>
                <td>{{$p->sisa}}</td>
                <td>{{$p->total}}</td>
                <td><a href="{{url('penjualan/delete/'.$p->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                		<a href="#modal-edit{{$p->id}}" data-target="#modal-edit{{$p->id}}" data-toggle="modal" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
           
             <div class="modal fade" id="modal-edit{{$p->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
                   <form action="{{url('penjualan/update/'.$p->id)}}" method="POST">
                 <div class="form-group">
                  <label>Nomor Faktur</label>
                  <input type="number" class="form-control" name="no_faktur" value="{{$p->no_faktur}}">
                </div>

 <div class="form-group">
                  <label>Tanggal Penjualan</label>
                  <input type="date" class="form-control" placeholder="" name="tgl_penjualan" value="{{$p->tgl_penjualan}}">
                </div>                  
                 <div class="form-group">
                  <label>ID Petugas</label>
                  <select class="form-control" name="id_petugas">
                    @foreach($petugas as $pe)
                    <option>{{$pe->id_petugas}}</option>
                    @endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label>Bayar</label>
                  <input type="number" class="form-control" name="bayar" value="{{$p->bayar}}">
                </div>
                 <div class="form-group">
                  <label>Sisa</label>
                  <input type="number" class="form-control" name="sisa" value="{{$p->sisa}}">
                </div>

                 <div class="form-group">
                  <label>Total</label>
                  <input type="number" class="form-control" placeholder="" name="total" value="{{$p->total}}">
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                @csrf
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>

            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        @endforeach

        </tbody>

    </table>
          @endsection