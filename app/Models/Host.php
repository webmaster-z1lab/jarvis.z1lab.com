<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Server
 *
 * @package App\Models
 * @property-read string $id
 * @property string      $name
 * @property string      $url
 * @property string      $description
 * @property string      $icon
 * @property string      $health
 * @property bool        $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Host isActive()
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Check[] $checks
 * @property-read int|null $checks_count
 * @property-read \App\Models\Server $server
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Host newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Host newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Host query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Host whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Host whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Host whereHealth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Host whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Host whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Host whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Host whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Host whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Host whereUrl($value)
 * @mixin \Eloquent
 */
class Host extends UuidModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'description',
        'icon',
        'health',
        'is_active',
    ];

    protected $attributes = [
        'health' => HostHealth::HEALTHY,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function checks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Check::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function server(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Server::class);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsActive(Builder $query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('is_active', TRUE);
    }
}
