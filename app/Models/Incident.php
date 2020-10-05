<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Incident
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Check[] $checks
 * @property-read int|null $checks_count
 * @property-read \App\Models\Host $host
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Incident fromHost(\App\Models\Host $host)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Incident isOpen()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Incident newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Incident newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Incident query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $host_id
 * @property string|null $description
 * @property string|null $solution
 * @property \Illuminate\Support\Carbon $started_at
 * @property \Illuminate\Support\Carbon|null $finished_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Incident whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Incident whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Incident whereFinishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Incident whereHostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Incident whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Incident whereSolution($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Incident whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Incident whereUpdatedAt($value)
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

    protected $dates = [
        'started_at',
        'finished_at',
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
