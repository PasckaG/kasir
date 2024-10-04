<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\transaksi;

class TransaksiController extends Controller
{
    //
    public function home()
    {
        $data = array(
            'title' => 'Data Transaksi',
            'data_transaksi' => transaksi::all(),
        );
       return view('admin.master.transaksi.listtransaksi', $data);
    }

    public function create()
    {
        $data = array(
            'title' => 'Create Data Transaksi',
        );
       return view('admin.master.transaksi.add', $data);
}
}