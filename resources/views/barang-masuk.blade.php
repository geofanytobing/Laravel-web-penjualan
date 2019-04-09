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

      <?php 
      $d = \App\tbldistributor::all();
      $p = \App\tblpetugas::all();
      ?>
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
              	<form action="{{url('barang-masuk/save')}}" method="POST">
                @csrf 
                 <div class="form-group">
                  <label>Nomor Nota</label>
                  <input type="number" class="form-control" name="no_nota">
                </div>
         <div class="form-group">
                  <label>Tanggal Masuk</label>
                  <input type="date" class="form-control" placeholder="" name="tgl_masuk">
                </div>	                
                 <div class="form-group">
                  <label>ID Distributor</label>
                  <select class="form-control" name="id_distributor">
                    @foreach($d as $distributor)
                  	<option>{{$distributor->id_distributor}}</option>
                  	@endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label>ID Petugas</label>
                  <select class="form-control" name="id_petugas">
                    @foreach($p as $petugas)
                  	<option>{{$petugas->id_petugas}}</option>
                  @endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label>Total</label>
                  <input type="number" class="form-control" name="total">
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
    <?php 
      $bm = \App\tblbrgmasuk::all();
       $d = \App\tbldistributor::all();
      $p = \App\tblpetugas::all();
    ?>
<table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr>
                <th>Nomor Nota</th>
                <th>Tanggal Masuk</th>
                <th>ID Distributor</th>
                <th>ID Petugas</th>
                <th>Total</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        @foreach($bm as $b)
        <tr>

          <td>{{$b->no_nota}}</td>
          <td>{{$b->tgl_masuk}}</td>
          <td>{{$b->id_distributor}}</td>
          <td>{{$b->id_petugas}}</td>
          <td>{{$b->total}}</td>
          <td><a href="{{url('barang-masuk/delete/'.$b->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                    <a href="#modal-edit{{$b->id}}" data-target="#modal-edit{{$b->id}}" data-toggle="modal" class="btn btn-primary"><i class="fa fa-edit"></i></td>
        </tr>
         <div class="modal fade" id="modal-edit{{$b->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
                <form action="{{url('barang-masuk/update/'.$b->id)}}" method="POST">
                
                 <div class="form-group">
                  <label>Nomor Nota</label>
                  <input type="number" class="form-control" name="no_nota" value="{{$b->no_nota}}">
                </div>
         <div class="form-group">
                  <label>Tanggal Masuk</label>
                  <input type="date" class="form-control" placeholder="" name="tgl_masuk" value="{{$b->tgl_masuk}}">
                </div>                  
                 <div class="form-group">
                  <label>ID Distributor</label>
                  <select class="form-control" name="id_distributor">

                    @foreach($d as $distributor)
                    <option>{{$distributor->id_distributor}}</option>
                    @endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label>ID Petugas</label>
                  <select class="form-control" name="id_petugas">
                    @foreach($p as $petugas)
                    <option>{{$petugas->id_petugas}}</option>
                  @endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label>Total</label>
                  <input type="number" class="form-control" name="total" value="{{$b->total}}">
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
        <tbody>
           
           
        </tbody>
    </table>
          @endsection