<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengantaran extends Model
{
    use HasFactory;
    protected $primaryKey ='id';
    protected $fillable =[
        'pengantaran_id',
        'nama',
        'alamat',
        'no_telp',
    ];
}
