<?php

namespace App\Models;

use App\Traits\IsActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Server
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Metric[] $metrics
 * @property-read int|null $metrics_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server isActive()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $type
 * @property string|null $ip
 * @property string $user
 * @property string $os
 * @property string|null $password
 * @property string $region
 * @property string|null $ssh_key
 * @property int $port
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server whereOs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server wherePort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server whereSshKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Server whereUser($value)
 */
class Server extends Model
{
    use HasFactory, IsActive;

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

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function metrics(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Metric::class);
    }
}
