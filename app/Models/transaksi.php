<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table ='tbl_transaksi';

    protected $fillable = [
        'no_transaksi',
        'tanggal_transaksi',
        'diskon',
        'kembalian',
        'uang_pembeli',
        'total_bayar' ,
        
    ];
        const CREATED_AT ='created_at';
        const UPDATE_AT ='updated_at';
}

