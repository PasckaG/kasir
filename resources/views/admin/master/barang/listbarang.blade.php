@extends('layout.layout')
 @section('content')
 
 <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title}}</a></li>
                    </ol>
                </div>
            </div>
           
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">{{ $title}}</h4>
                                <button type ="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data 
                                </button>
                            </div>
                        </div>
                            <div class="card-body">
                            <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Jenis</th>
                                                <th>Harga</th>
                                                <th>Stok </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp
                                            @foreach ($data_barang as $row)

                                        <tr>
                                                <td>{{ $no++}}</td>
                                                <td>{{$row-> Nama_barang }}</td>
                                                <td>{{$row-> Nama_jenis }}</td>
                                                <td>Rp.{{ number_format($row-> harga) }}</td>
                                                <td>{{$row-> stok }} Pcs</td>
                                            <td>
                                            <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalEdit{{$row->id}}"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="#" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus{{$row->id}}"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                            @endforeach
                                        </tbody>                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <form method="POST" action="/barang/store">
            @csrf
         <div class="modal-body">
            <div class="form-group">
               <label> Nama Barang</label>
               <input type="text" class="form-control" name="Nama_barang" placeholder=" Nama Barang..." required> 
        </div>
        <div class="modal-body">
            <div class="form-group">
               <label> Jenis Barang</label>
               <select class="form-control" name="id_jenis" required>
               <option value="" hidden>...Pilih Jenis Barang...</option>
               @foreach ($data_jenis as $b)
               <option value="{{$b->id}}">{{$b->Nama_jenis}}</option>
               @endforeach
               </select>
        </div>
        <div class="input-group mb-3">
<div class="input-group-prepend"><span class="input-group-text">Rp</span>
</div>
<input type="number" name="harga" class="form-control" placeholder="Harga" required>
</div>
    <div class="input-group mb-3">
        <input type="number" name="stok" placeholder="stok..." class="form-control"required>
        <div class="input-group-append"><span class="input-group-text">Pcs</span>
        </div>
    </div>
    </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save Changes</button>
</div>
</form>
</div>
</div>
</div>

@foreach ($data_barang as $d)
<div class="modal fade" id="modalEdit{{$d->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/barang/update/{{$d->id}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="Nama_barang" value="{{$d->Nama_barang}}" placeholder="Nama Barang..." required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Barang</label>
                        <select class="form-control" name="id_jenis" required>
                            <option value="{{$d->id_jenis}}">{{$b->Nama_jenis}}</option>
                            @foreach ($data_jenis as $b)
                            <option value="{{$b->id}}" hidden>"{{$b->Nama_jenis}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"><span class="input-group-text">Rp</span>
                        </div>
                        <input type="number" name="harga" value="{{ $d->harga}}" class="form-control" placeholder="Harga" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" name="stok" value="{{ $d->stok}}" placeholder="Stok..." class="form-control" required>
                        <div class="input-group-append"><span class="input-group-text">Pcs</span>
                        </div>
                    </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection