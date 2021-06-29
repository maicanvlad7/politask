<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'placedBy',
        'price',
        'comment',
        'driverId',
        'orderId'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'driverId');
    }

}
