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
              	<form action="{{url('detail-barang/save')}}" method="POST">
                 <div class="form-group">
                  @csrf
                  <label>Nomor Nota</label>
                 <select class="form-control" name="no_nota">
                  <?php 
                    $masuk = \App\tblbrgmasuk::all();
                  ?>
                  @foreach($masuk  as $m)
                    <option>{{$m->no_nota}}</option>
                    @endforeach
                  </select>
                </div>

 <div class="form-group">
                  <label>Kode Barang</label>
                  <select class="form-control" name="kode_barang">
                      <?php 
                        $barang = \App\tblbarang::all();
                      ?>
                      @foreach($barang as $b)
                        <option>{{$b->kode_barang}}</option>
                        @endforeach
                    </select>
                </div>	 
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" class="form-control" name="jumlah">
                </div>   
                <div class="form-group">
                  <label>Subtotal</label>
                  <input type="number" class="form-control" name="sub_total">
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
                <th>Nomor Nota</th>
                <th>Kode Barang</th>
                <th>Jumlah</th>
                <th>Sub Total</th>
               
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <?php
                $detail = \App\tbldetailbrgmasuk::all();
              ?>
              @foreach($detail as $d)
            	<td>{{$d->no_nota}}</td>
                <td>{{$d->kode_barang}}</td>
                <td>{{$d->jumlah}}</td>
                <td>{{$d->sub_total}}</td>
              
                   <td><a href="{{url('detail-barang/delete/'.$d->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                		<a href="#modal-edit{{$d->id}}" data-target="#modal-edit{{$d->id}}" data-toggle="modal" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
                <div class="modal fade" id="modal-edit{{$d->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
                <form action="{{url('detail-barang/update/'.$d->id)}}" method="POST">
                 <div class="form-group">
                  <label>Nomor Nota</label>
                 <select class="form-control" name="no_nota">
                  <?php 
                    $masuk = \App\tblbrgmasuk::all();
                  ?>
                  @foreach($masuk  as $m)
                    <option>{{$m->no_nota}}</option>
                    @endforeach
                  </select>
                </div>

 <div class="form-group">
                  <label>Kode Barang</label>
                  <select class="form-control" name="kode_barang">
                      <?php 
                        $barang = \App\tblbarang::all();
                      ?>
                      @foreach($barang as $b)
                        <option>{{$b->kode_barang}}</option>
                        @endforeach
                    </select>
                </div>   
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" class="form-control" name="jumlah" value="{{$d->jumlah}}">
                </div>   
                <div class="form-group">
                  <label>Subtotal</label>
                  <input type="number" class="form-control" name="sub_total" value="{{$d->sub_total}}">
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