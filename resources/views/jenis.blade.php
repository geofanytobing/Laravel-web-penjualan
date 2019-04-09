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
              	<form action="{{url('jenis/save')}}" method="POST">
                  @csrf
                 <div class="form-group">
                  <label>Kode Jenis</label>
                  <input type="number" class="form-control" placeholder="" name="kode_jenis" required="">
                </div>
                <div class="form-group">
                  <label>Jenis</label>
                  <input type="text" class="form-control" placeholder="" name="jenis" required="">
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
                <th>Kode Jenis</th>
                <th>Jenis</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $jenis = \App\tbljenis::all();
          ?>

          
          @foreach($jenis as $key)
            <tr>

                <td>{{$key->kode_jenis}}</td>
                <td>{{$key->jenis}}</td>
                <td><a href="{{url('jenis/delete/'.$key->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
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
                <form action="{{url('jenis/update/'.$key->id)}}" method="POST">
                 
                     <div class="form-group">
                  <label>Kode Jenis</label>
                  <input type="number" class="form-control" value="{{$key->kode_jenis}}" name="kode_jenis" >
                </div>
                <div class="form-group">
                  <label>Jenis</label>
                  <input type="text" class="form-control"  value="{{$key->jenis}}" name="jenis">
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