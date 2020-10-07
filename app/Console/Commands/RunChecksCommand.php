<?php

namespace App\Console\Commands;

use App\Models\Check;
use App\Models\CheckStatus;
use App\Models\Host;
use App\Repositories\HostRepository;
use App\Services\HostCheckService;
use Illuminate\Console\Command;

class RunChecksCommand extends Command
{
    protected $signature = 'run:checks {host? : The NAME of the host}';

    protected $description = 'Run all hosts verifications';

    public function handle()
    {
        $host = (new HostRepository())->getByName($this->argument('host'));

        if(null === $host) {
            $hosts = (new HostRepository())->getActiveServers();

            $this->info("Starting check for {$hosts->count()} host(s).");
            $bar = $this->createProgressBar($hosts->count());

            /**
             * @var \App\Models\Host $host
             */
            foreach ($bar->iterate($hosts) as $host) {
                $check = (new HostCheckService())->check($host);

                $this->checkMessage($host, $check);
            }
        } else {
            $this->info("Starting check for {$host->name}.");

            $check = (new HostCheckService())->check($host);

            $this->checkMessage($host, $check);
        }

        $this->info('Finished hosts check.');
    }

    private function checkMessage(Host $host, Check $check)
    {
        if($check->status === CheckStatus::SUCCESS) {
            $this->info("{$host->name} check {$check->status}.");
        } else {
            $this->error("{$host->name} check {$check->status}.");
        }
    }

    /**
     * @param  int  $count
     *
     * @return \Symfony\Component\Console\Helper\ProgressBar
     */
    private function createProgressBar(int $count)
    {
        $bar = $this->output->createProgressBar($count);
        $bar->setFormat('debug');

        return $bar;
    }
}
