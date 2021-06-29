<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'vehicle',
        'idImage',
        'licenseImage',
        'telephone',
        'age',
        'gender',
        'idUser',
        'verified'
    ];
}
