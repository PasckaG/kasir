<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diskon extends Model
{
    use HasFactory;
    protected $table ='tbl_diskon';

    protected $fillable = [
        'total_belanja',
        'diskon',
        
        
    ];
        const CREATED_AT ='created_at';
        const UPDATE_AT ='updated_at';
}
