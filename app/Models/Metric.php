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
 * @property int $id
 * @property string|null $server_id
 * @property float $cpu
 * @property float $ram
 * @property float $storage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Metric whereCpu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Metric whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Metric whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Metric whereRam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Metric whereServerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Metric whereStorage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Metric whereUpdatedAt($value)
 */
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
