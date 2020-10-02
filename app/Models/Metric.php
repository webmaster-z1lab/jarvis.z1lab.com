<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Metric
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Metric newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Metric newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Metric query()
 * @mixin \Eloquent
 */
class Metric extends Model
{
    use HasFactory;

    protected $attributes = [
        'cpu',
        'ram',
        'storage',
    ];
}
