<?php

namespace App\Console\Commands;

use App\Repositories\HostRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CreateHostCommand extends Command
{
    protected $signature = 'create:host';

    protected $description = 'Create a new host';

    public function handle()
    {
        $this->info("Let's create a new host!");

        $name = $this->ask('What is the NAME of the host');
        $url = $this->ask('What is the URL of the host');
        $description = $this->ask('What is the description of the host');
        $icon = $this->ask('What is the icon of the host');
        $is_active = $this->confirm('Is the host active?', TRUE);

        $data = [
            'name'        => $name,
            'url'         => $url,
            'description' => $description,
            'icon'        => $icon,
            'is_active'   => $is_active,
        ];

        $host = (new HostRepository())->create($data);

        $this->info("New host added with id {$host->id}.");

        if($this->confirm('Do you like to run a new check?', TRUE)) {
            Artisan::call('run:checks');
        }
    }
}
