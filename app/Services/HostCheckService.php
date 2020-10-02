<?php


namespace App\Services;

use App\Models\CheckStatus;
use App\Models\Host;
use App\Repositories\CheckRepository;
use Illuminate\Support\Facades\Http;
use SebastianBergmann\Timer\Timer;

class HostCheckService
{
    /**
     * @param  \App\Models\Host  $host
     *
     * @return \App\Models\Check
     */
    public function check(Host $host): \App\Models\Check
    {
        $timer = new Timer;
        $timer->start();

        $response = Http::get($host->url);
        $duration = $timer->stop();

        $data = [
            'latency' => $duration->asMilliseconds(),
            'message' => $response->body(),
            'output'  => $response->json(),
            'code'    => $response->status(),
            'status'  => $response->successful() ? CheckStatus::SUCCESS : CheckStatus::FAILED,
        ];

        return (new CheckRepository())->create($host, $data);
    }
}
