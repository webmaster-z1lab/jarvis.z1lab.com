<?php

namespace App\Models;

use App\Traits\IsActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Host extends UuidModel
{
    use HasFactory, IsActive;

    protected $fillable = [
        'name',
        'url',
        'description',
        'icon',
        'health',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
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

}
