<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class UuidModel extends Model
{
    public $incrementing = FALSE;

    protected $keyType = 'string';

    public static function boot(): void
    {
        parent::boot();

        static::creating(static function (self $model): void {
            $model->{$model->getKeyName()} = $model->{$model->getKeyName()} ?: Str::orderedUuid();
        });
    }
}
