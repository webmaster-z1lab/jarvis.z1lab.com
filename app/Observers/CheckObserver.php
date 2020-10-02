<?php

namespace App\Observers;

use App\Jobs\MakeIncident;
use App\Models\Check;
use App\Models\CheckStatus;

class CheckObserver
{
    /**
     * @param  \App\Models\Check  $check
     */
    public function created(Check $check): void
    {
        if($check->status === CheckStatus::FAILED) {
            MakeIncident::dispatch($check);
        }
    }
}
