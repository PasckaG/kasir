<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBarang;

class JenisBarangController extends Controller
{
    public function home()
    {
        $data = array(
            'title' => 'Data jenis barang',
            'data_jenis' => JenisBarang::all(),
        );
       return view('admin.master.jenisbarang.listjenis', $data);
    }

    public function store(Request $request)
    {
        JenisBarang::create([
            'Nama_jenis'    => $request->Nama_jenis,
        ]);
        return redirect('/JenisBarang')->with('success','Data berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        JenisBarang::where('id', $id)
            ->update([
                'Nama_jenis'    => $request->Nama_jenis,
               
            ]);
        return redirect('/JenisBarang')->with('success','Data berhasil diubah');
    }

    public function destroy($id)
{
    JenisBarang::where('id', $id)->delete();
    return redirect('/JenisBarang')->with('success', 'Data berhasil dihapus');
}
} 

