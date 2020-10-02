<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Service
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service query()
 * @mixin \Eloquent
 */
class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'provider',
        'region',
        'status',
    ];

    protected $attributes = [
        'status' => ServiceStatus::ONLINE
    ];
}
