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
 <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
              	<form action="{{url('barang/save')}}" method="POST">
                  @csrf
                 <div class="form-group">
                  <label>Kode Barang</label>
                  <input type="number" class="form-control" placeholder="" name="kode_barang" required="">
                </div>
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" placeholder="" name="nama_barang" required="">
                </div>
                <div class="form-group">
                  <label>Harga Net</label>
                  <input type="number" class="form-control" placeholder="" name="harga_net" required="">
                </div>
                <div class="form-group">
                  <label>Harga Jual</label>
                  <input type="number" class="form-control" placeholder="" name="harga_jual" required="">
                </div>
                <div class="form-group">
                  <label>Stok</label>
                  <input type="number" class="form-control" placeholder="" name="stok" required="">
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
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Net</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $barang = \App\tblbarang::all();
          ?>

          
          @foreach($barang as $key)
            <tr>

                <td>{{$key->kode_barang}}</td>
                <td>{{$key->nama_barang}}</td>
                <td>{{$key->harga_net}}</td>
                <td>{{$key->harga_jual}}</td>
                <td>{{$key->stok}}</td>
                <td><a href="{{url('barang/delete/'.$key->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                		<a href="#modal-edit{{$key->id}}" data-target="#modal-edit{{$key->id}}" data-toggle="modal" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
              <div class="modal fade" id="modal-edit{{$key->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
                <form action="{{url('barang/update/'.$key->id)}}" method="POST">
                 
                     <div class="form-group">
                  <label>Kode Barang</label>
                  <input type="number" class="form-control" value="{{$key->kode_barang}}" name="kode_barang" >
                </div>
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" value="{{$key->nama_barang}}"  name="nama_barang">
                </div>
                <div class="form-group">
                  <label>Harga Net</label>
                  <input type="number" class="form-control" value="{{$key->harga_net}}"  name="harga_net">
                </div>
                <div class="form-group">
                  <label>Harga Jual</label>
                  <input type="number" class="form-control" value="{{$key->harga_jual}}"  name="harga_jual">
                </div>
                <div class="form-group">
                  <label>Stok</label>
                  <input type="number" class="form-control"  value="{{$key->stok}}" name="stok">
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                 @csrf
                <button type="submit" class="btn btn-primary">Edit</button>
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