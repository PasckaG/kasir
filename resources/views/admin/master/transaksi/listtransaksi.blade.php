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
                       
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">{{ $title}}</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="/transaksi/create">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data 
                                </a>
                            </div>
                            
                            <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No transaksi</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Total Bayar</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp
                                            @foreach ($data_transaksi as $row)

                                        <tr>
                                                <td>{{ $no++}}</td>
                                                <td>{{$row-> no_transaksi }}</td>
                                                <td>{{date('d/M/Y', strtotime($row-> tanggal_transaksi)) }}</td>
                                                <td>Rp.{{ number_format($row-> harga) }}</td>
                                                <td>{{$row-> total_bayar }}</td>
                                            <td>
                                            <a href="#" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-print"></i> Cetak</a>
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
       

@endsection