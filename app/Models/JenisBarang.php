<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;
    protected $table ='tbl_jenis_barang';

    protected $fillable = [
        'Nama_jenis',
        
    ];
        const CREATED_AT ='created_at';
        const UPDATE_AT ='updated_at';
}

    



