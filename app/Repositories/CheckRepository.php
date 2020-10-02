<?php


namespace App\Repositories;

use App\Models\Check;
use App\Models\Host;

class CheckRepository
{
    /**
     * @param  \App\Models\Host  $host
     * @param  array             $data
     *
     * @return \App\Models\Check
     */
    public function create(Host $host, array $data): \App\Models\Check
    {
        $check = new Check($data);
        $check->host()->associate($host);
        $check->save();

        return $check;
    }
}
