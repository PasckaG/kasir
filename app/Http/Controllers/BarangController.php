<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\JenisBarang;

class BarangController extends Controller
{
    //
    public function home()
    {
        $data = array(
            'title' => 'Data  barang',
            'data_jenis' => JenisBarang::all(),
            'data_barang' => barang::join('tbl_jenis_barang','tbl_jenis_barang.id','=','tbl_barang.id_jenis')
                                    ->select('tbl_barang.*','tbl_jenis_barang.Nama_jenis')
                                    ->get(),

        );
       
        return view('admin.master.barang.listbarang', $data);
    }

    public function store(Request $request)
    {
        barang::create([
            'id_jenis'     =>$request->id_jenis,
            'Nama_barang'  =>$request->Nama_barang,
            'harga'        =>$request->harga,
            'stok'         =>$request->stok,

        ]);
        return redirect('/barang')->with('success','Data berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        barang::where('id', $id)
            ->update([
                'id_jenis'     =>$request->id_jenis,
                'Nama_barang'  => $request->Nama_barang,
                'harga'        => $request->harga,
                'stok'         => $request->stok,
               
            ]);
        return redirect('/barang')->with('success','Data berhasil diubah');
    }

    public function destroy($id)
{
    barang::where('id', $id)->delete();
    return redirect('/barang')->with('success', 'Data berhasil dihapus');
}
} 



