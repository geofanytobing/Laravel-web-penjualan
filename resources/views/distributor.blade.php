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
              	<form action="{{url('distributor/save')}}" method="POST">
                  @csrf
                 <div class="form-group">
                  <label>ID Distributor</label>
                  <input type="number" class="form-control" name="id_distributor">
                </div>

 <div class="form-group">
                  <label>Nama Distributor</label>
                  <input type="text" class="form-control" name="nama_distributor" >
                </div>	 
                <label>Alamat</label>               
                 <div class="form-group">
                    <textarea class="form-control" name="alamat"></textarea>
                </div>
                 <div class="form-group">
                  <label>Kota Asal</label>
                  <input type="text" class="form-control" name="kota_asal">
                </div>
                 <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                  <label>Telepon</label>
                  <input type="number" class="form-control" name="telepon">
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
                <th>Id Distributor</th>
                <th>Nama Distributor</th>
                <th>Alamat</th>
                <th>Kota Asal</th>
                <th>Email</th>
                <th>Telepon</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
          <?php 

          $d = \App\tbldistributor::all();

          ?>
          @foreach($d as $value)
            <tr>
                <td>{{$value->id_distributor}}</td>
                <td>{{$value->nama_distributor}}</td>
                <td>{{$value->alamat}}</td>
                <td>{{$value->kota_asal}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->telepon}}</td>
                <td><a href="{{url('distributor/delete/'.$value->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                		<a href="#modal-edit{{$value->id}}" data-target="#modal-edit{{$value->id}}" data-toggle="modal" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            <div class="modal fade" id="modal-edit{{$value->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
                <form action="{{url('distributor/update/'.$value->id)}}" method="POST">
                  
                 <div class="form-group">
                  <label>ID Distributor</label>
                  <input type="number" class="form-control" name="id_distributor" value="{{$value->id_distributor}}">
                </div>

 <div class="form-group">
                  <label>Nama Distributor</label>
                  <input type="text" class="form-control" name="nama_distributor" value="{{$value->nama_distributor}}">
                </div>   
                <label>Alamat</label>               
                 <div class="form-group">
                    <textarea class="form-control" name="alamat">{{$value->alamat}}</textarea>
                </div>
                 <div class="form-group">
                  <label>Kota Asal</label>
                  <input type="text" class="form-control" name="kota_asal" value="{{$value->kota_asal}}">
                </div>
                 <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" value="{{$value->email}}">
                </div>
                <div class="form-group">
                  <label>Telepon</label>
                  <input type="number" class="form-control" name="telepon" value="{{$value->telepon}}">
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                @csrf
                <button type="submit" class="btn btn-primary">Updates</button>
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