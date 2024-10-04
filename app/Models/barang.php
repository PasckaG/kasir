<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table ='tbl_barang';

    protected $fillable = [
        'id_jenis',
        'Nama_barang',
        'harga',
        'stok' ,
        
    ];
        const CREATED_AT ='created_at';
        const UPDATE_AT ='updated_at';
}

