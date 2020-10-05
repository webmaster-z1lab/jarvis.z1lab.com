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
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $provider
 * @property string $region
 * @property string $status
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereUpdatedAt($value)
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
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $attributes = [
        'status'    => ServiceStatus::ONLINE,
        'is_active' => TRUE,
    ];
}
