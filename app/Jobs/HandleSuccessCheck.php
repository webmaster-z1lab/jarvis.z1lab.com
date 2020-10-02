<?php

namespace App\Jobs;

use App\Models\Check;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class HandleSuccessCheck implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var \App\Models\Check
     */
    protected $check;

    /**
     * HandleSuccessCheck constructor.
     *
     * @param  \App\Models\Check  $check
     */
    public function __construct(Check $check)
    {
        $this->check = $check;
    }

    public function handle(): void
    {

    }
}
