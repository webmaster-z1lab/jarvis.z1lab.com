<?php

namespace App\Repositories;

use App\Models\Server;

class ServerRepository
{
    /**
     * @return \App\Models\Server[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Server::all();
    }

    /**
     * @param  array  $data
     *
     * @return \App\Models\Server
     */
    public function create(array $data): Server
    {
        return Server::create($data);
    }

    /**
     * @param  array               $data
     * @param  \App\Models\Server  $server
     *
     * @return \App\Models\Server
     */
    public function update(array $data, Server $server): Server
    {
        $server->update($data);

        return $server;
    }

    /**
     * @param  \App\Models\Server  $server
     *
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Server $server): ?bool
    {
        return $server->delete();
    }
}
