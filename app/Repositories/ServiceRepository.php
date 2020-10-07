<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository
{
    /**
     * @return \App\Models\Service[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Service::all();
    }

    /**
     * @param  array  $data
     *
     * @return \App\Models\Service
     */
    public function create(array $data): Service
    {
        return Service::create($data);
    }

    /**
     * @param  array                $data
     * @param  \App\Models\Service  $service
     *
     * @return \App\Models\Service
     */
    public function update(array $data, Service $service): Service
    {
        $service->update($data);

        return $service;
    }

    /**
     * @param  \App\Models\Service  $service
     *
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Service $service): ?bool
    {
        return $service->delete();
    }
}
