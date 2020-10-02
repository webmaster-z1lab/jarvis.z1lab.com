<?php

namespace App\Models;

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


}
