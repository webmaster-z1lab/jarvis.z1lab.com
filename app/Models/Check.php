<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Check
 *
 * @property string $id
 * @property string|null $host_id
 * @property string $status
 * @property int|null $code
 * @property float|null $latency
 * @property string|null $message
 * @property mixed|null $output
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Host|null $host
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Check newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Check newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Check query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Check whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Check whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Check whereHostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Check whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Check whereLatency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Check whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Check whereOutput($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Check whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Check whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $incident_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Check whereIncidentId($value)
 */
class Check extends UuidModel
{
    use HasFactory;

    protected $fillable = [
        'status',
        'latency',
        'message',
        'output',
        'code',
    ];

    protected $casts = [
        'latency' => 'float',
        'code'    => 'integer',
    ];

    protected $attributes = [
        'status' => CheckStatus::NOT_CHECKED,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function host()
    {
        return $this->belongsTo(Host::class);
    }
}
