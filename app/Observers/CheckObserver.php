<?php

namespace App\Observers;

use App\Jobs\HandleFailCheck;
use App\Jobs\HandleSuccessCheck;
use App\Models\Check;
use App\Models\CheckStatus;

class CheckObserver
{
    /**
     * @param  \App\Models\Check  $check
     */
    public function created(Check $check): void
    {
        if($check->status === CheckStatus::SUCCESS) {
            HandleSuccessCheck::dispatch($check);
        }

        if($check->status === CheckStatus::FAILED) {
            HandleFailCheck::dispatch($check);
        }
    }
}
