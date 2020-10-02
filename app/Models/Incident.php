<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Incident
 *
 * @package App\Models
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Check[] $checks
 * @property-read int|null $checks_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Incident newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Incident newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Incident query()
 * @mixin \Eloquent
 */
class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'started_at',
        'finished_at',
        'description',
        'solution',
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
    public function host(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Host::class);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \App\Models\Host                       $host
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFromHost(Builder $query, Host $host): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('host_id', $host->id);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsOpen(Builder $query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereNull('finished_at');
    }

}
