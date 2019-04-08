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
              	<form action="{{url('petugas/save')}}" method="POST">
                    @csrf

                 <div class="form-group">
                        <label>ID Petugas</label>
                  <input type="number" class="form-control" name="id_petugas">
                </div>
                <div class="form-group">
                  <label>Nama Petugas</label>
                  <input type="text" class="form-control" placeholder="" name="nama_petugas" required="">
                </div>	    
                 <div class="form-group">
                  <label>Alamat</label>
                  <textarea type="text" class="form-control" placeholder="" name="alamat" required=""></textarea>
                </div>   
                 <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" placeholder="" name="email" required="">
                </div>               
                  <div class="form-group">
                  <label>Nomor Telepon</label>
                  <input type="number" class="form-control" placeholder="" name="telepon" Arequired="">
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
                <th>ID Petugas</th>
                <th>Nama Petugas</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telepon</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
<?php
$p = \App\tblpetugas::all();

?>

@foreach($p as $petugas)

            <tr>
                <td>{{$petugas->id_petugas}}</td>
                <td>{{$petugas->nama_petugas}}</td>
                <td>{{$petugas->alamat}}</td>
                <td>{{$petugas->email}}</td>
                <td>{{$petugas->telepon}}</td>
                <td><a href="{{url('petugas/delete/'.$petugas->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                		<a href="#modal-edit{{$petugas->id}}" data-target="#modal-edit{{$petugas->id}}" data-toggle="modal" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
             <div class="modal fade" id="modal-edit{{$petugas->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
                <form action="{{url('petugas/update/'.$petugas->id)}}" method="POST">
                  

                 <div class="form-group">
                        <label>ID Petugas</label>
                  <input type="number" class="form-control" value="{{$petugas->id_petugas}}" name="id_petugas" >
                </div>
                <div class="form-group">
                  <label>Nama Petugas</label>
                  <input type="text" class="form-control" placeholder="" required="" value="{{$petugas->nama_petugas}}" name="nama_petugas" >
                </div>      
                 <div class="form-group">
                  <label>Alamat</label>
                  <textarea type="text" class="form-control" placeholder=""  required="" name="alamat">{{$petugas->alamat}}</textarea>
                </div>   
                 <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" placeholder="" required="" value="{{$petugas->email}}" name="email">
                </div>               
                  <div class="form-group">
                  <label>Nomor Telepon</label>
                  <input type="number" class="form-control" placeholder=""  required="" value="{{$petugas->telepon}}" name="telepon">
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