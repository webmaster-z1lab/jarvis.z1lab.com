<?php

namespace App\Console\Commands;

use App\Repositories\ServiceRepository;
use Illuminate\Console\Command;

class CreateServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->info("Let's create a new service!");

        $name = $this->ask('What is the name of the service? ');
        $type = $this->ask('What is the type of the service? ');
        $provider = $this->ask('What is the provider of the service? ');
        $region = $this->ask('What is the region of the service? ');
        $this->line('');

        $data = compact('name', 'type', 'provider', 'region');

        foreach ($data as $key => $value) {
            if (empty($value)) {
                $data[$key] = NULL;
            }
        }

        $validator = \Validator::make($data, [
            'name'     => 'bail|required|string',
            'type'     => 'bail|required|string',
            'provider' => 'bail|required|string',
            'region'   => 'bail|required|string',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->messages() as $message) {
                $this->error($message);
            }

            return;
        }

        $service = (new ServiceRepository())->create($data);

        $this->info("New service added with id {$service->id}.");

        if ($this->confirm('Do you like to run a new check?', TRUE)) {
            \Artisan::call('run:checks');
        }
    }
}
