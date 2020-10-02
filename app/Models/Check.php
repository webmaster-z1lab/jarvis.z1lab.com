<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Status
 *
 * @package App\Models
 * @property-read string         $id
 * @property string              $status
 * @property string              $message
 * @property string              $output
 * @property int                 $code
 * @property float               $latency
 * @property-read \Carbon\Carbon $created_at
 * @property-read \Carbon\Carbon $updated_at
 * @property string|null $host_id
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
