<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Server
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Metric[] $metrics
 * @property-read int|null $metrics_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server query()
 * @mixin \Eloquent
 */
class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'ip',
        'port',
        'user',
        'os',
        'password',
        'region',
        'ssh_key',
    ];

    protected $attributes = [
        'port' => 22,
        'password' => '',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function metrics(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Metric::class);
    }
}
