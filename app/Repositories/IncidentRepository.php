<?php


namespace App\Repositories;


use App\Models\Check;
use App\Models\Incident;

class IncidentRepository
{
    public function create(Check $check): Incident
    {
        $incident = new Incident();

        $incident->checks()->save($check);
        $incident->save();

        return $incident;
    }

    public function getIncidentByCheck(Check $check): ?Incident
    {

    }
}
