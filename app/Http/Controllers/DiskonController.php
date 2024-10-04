<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\diskon;
class DiskonController extends Controller
{
    //
    public function home()
    {
        $data = array(
            'title' => 'Data Diskon',
            'data_diskon' => diskon::all(),
        );
       return view('admin.master.settingdiskon.diskonlist', $data);
    }


    public function update(Request $request, $id)
    {
        diskon::where('id', $id)
            ->update([
                'total_belanja'    => $request->total_belanja,
                'diskon'    => $request->diskon,
               
            ]);
        return redirect('/diskon')->with('success','Data berhasil diubah');
    }
}
