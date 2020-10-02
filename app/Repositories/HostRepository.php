<?php


namespace App\Repositories;


use App\Models\Host;

class HostRepository
{
    /**
     * @param  string  $name
     *
     * @return \App\Models\Host|null
     */
    public function getByName(string $name): ?\App\Models\Host
    {
        return Host::where('name', $name)->first();
    }
    /**
     * @return \App\Models\Host[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getActiveServers()
    {
        return Host::isActive()->get();
    }

    /**
     * @param  array  $data
     *
     * @return \App\Models\Host
     */
    public function create(array $data): \App\Models\Host
    {
        return Host::create($data);
    }
}
