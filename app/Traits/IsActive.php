<?php


namespace App\Traits;


use Illuminate\Database\Eloquent\Builder;

trait IsActive
{
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
