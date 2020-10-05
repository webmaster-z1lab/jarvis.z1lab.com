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

    /**
     * @param  \App\Models\Check  $check
     *
     * @return \App\Models\Incident|null
     */
    public function getOpenIncident(Check $check): ?Incident
    {
        return Incident::fromHost($check->host)->isOpen()->first();
    }

    /**
     * @param  \App\Models\Incident  $incident
     * @param  \App\Models\Check     $check
     *
     * @return \App\Models\Incident
     */
    public function addEvent(Incident $incident, Check $check)
    {
        $incident->checks()->save($check);
        $incident->save();

        return $incident;
    }
}
