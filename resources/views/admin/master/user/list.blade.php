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
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp
                                            @foreach ($data_user as $row)

                                        <tr>
                                                <td>{{ $no++}}</td>
                                                <td>{{$row-> name }}</td>
                                                <td>{{ $row->email}}</td>
                                                <td>{{ $row->role}}</td>
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
        <h5 class="modal-title">Create Data User</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <form method="POST" action="/user/store">
            @csrf
         <div class="modal-body">
            <div class="form-group">
               <label> Nama Lengkap</label>
               <input type="text" class="form-control" name="name" placeholder=" Nama Lengkap..." required>
         </div> 
         <div class="form-group">
               <label> Email</label>
               <input type="email" class="form-control" name="email" placeholder=" Email..." required>
         </div> 
         <div class="form-group">
               <label>Password</label>
               <input type="password" class="form-control" name="password" placeholder=" Password..." required>
         </div> 
         <div class="form-group">
               <label> Role</label>
            <select class="form-control" name="role" required>
            <option value="" hidden>..pilih role.. </option>
                <option value="admin">Admin </option>
                <option value="kasir">kasir</option>
            </select>

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

@foreach ($data_user as $d)
    <div class="modal fade" id="modalEdit{{$d->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="/user/update/{{$d->id}}">
            @csrf
            <div class="modal-body">
            <div class="form-group">
               <label> Nama Lengkap</label>
               <input type="text" value="{{$d->name}}" class="form-control" name="name" placeholder=" Nama Lengkap..." required>
         </div> 
         <div class="form-group">
               <label> Email</label>
               <input type="email" value="{{$d->email}}" class="form-control" name="email" placeholder=" Email..." required>
         </div> 
         <div class="form-group">
               <label>Password</label>
               <input type="password" class="form-control" name="password" placeholder=" Password..." required>
         </div> 
         <div class="form-group">
               <label> Role</label>
            <select class="form-control" name="role" required>
            <option value="" hidden>..pilih role.. </option>
                <option value="admin">Admin </option>
                <option value="kasir">kasir</option>
            </select>

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
@endforeach

@foreach ($data_user as $c)
<div class="modal fade" id="modalHapus{{$c->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form method="get" action="/user/destroy/{{$c->id}}">
                <div class="modal-body">
                <div class="form-group">
                        <h5>Apakah Anda Ingin Menghapus Data Ini ?</h5>
                    </div> 
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection