<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    use HasFactory;

    protected $attributes = [
        'cpu',
        'ram',
        'storage',
    ];

    protected $casts = [
        'cpu'     => 'float',
        'ram'     => 'float',
        'storage' => 'float',
    ];
}
