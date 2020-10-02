<?php

namespace App\Jobs;

use App\Models\Check;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MakeIncident implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * MakeIncident constructor.
     *
     * @param  \App\Models\Check  $check
     */
    public function __construct(Check $check)
    {
        //
    }

    public function handle(): void
    {
        //
    }
}
