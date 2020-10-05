<?php

namespace App\Models;

use App\Traits\IsActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
