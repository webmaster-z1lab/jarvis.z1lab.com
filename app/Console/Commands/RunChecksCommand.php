<?php

namespace App\Console\Commands;

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

            foreach ($bar->iterate($hosts) as $host) {
                (new HostCheckService())->check($host);
            }
        } else {
            $this->info("Starting check for {$host->name}.");

            $check = (new HostCheckService())->check($host);

            $this->info("Finished check for {$host->name} with status {$check->status}.");
        }

        $this->info('Finished hosts check.');
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
