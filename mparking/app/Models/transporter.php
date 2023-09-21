<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transporter extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'transporter_id',
        'nama',
    ];
}
