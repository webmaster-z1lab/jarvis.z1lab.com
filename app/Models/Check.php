<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

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
