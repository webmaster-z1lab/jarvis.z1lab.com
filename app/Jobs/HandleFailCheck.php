<?php

namespace App\Jobs;

use App\Models\Check;
use App\Repositories\IncidentRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class HandleFailCheck implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var \App\Models\Check
     */
    private $check;

    /**
     * HandleFailCheck constructor.
     *
     * @param  \App\Models\Check  $check
     */
    public function __construct(Check $check)
    {
        $this->check = $check;
    }

    public function handle(): void
    {
        $incidentRepository = new IncidentRepository();

        $incident = $incidentRepository->getOpenIncident($this->check);

        if(NULL === $incident) {
            $incidentRepository->create($this->check);
        } else {
            $incidentRepository->addEvent($incident, $this->check);
        }
    }
}
