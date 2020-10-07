<?php

namespace App\Console\Commands;

use App\Repositories\ServerRepository;
use Illuminate\Console\Command;

class CreateServerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:server';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new server';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->info("Let's create a new server!");

        $type = $this->ask('What is the TYPE of the server?');
        $ip = $this->ask('What is the IP address of the server?');
        $port = $this->ask('What is the PORT of the server?');
        $user = $this->ask('What is the USER of the server?');
        $os = $this->ask('What is the OS of the server?');
        $password = $this->ask('What is the PASSWORD of the server?');
        $ssh_key = $this->ask('What is the SSH KEY of the server?');
        $this->line('');

        $data = compact('type', 'ip', 'port', 'user', 'os', 'password', 'ssh_key');

        foreach ($data as $key => $value) {
            if (empty($value)) {
                $data[$key] = NULL;
            }
        }

        $validator = \Validator::make($data, [
            'type'     => 'bail|required|string',
            'ip'       => 'bail|nullable|ip',
            'port'     => 'bail|required|integer|min:1',
            'user'     => 'bail|required|string',
            'os'       => 'bail|required|string',
            'password' => 'bail|nullable|required_without:ssh_key|string',
            'ssh_key'  => 'bail|nullable|required_without:password|string',
        ], [], [
            'ip'      => 'ip address',
            'ssh_key' => 'ssh key',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->messages() as $message) {
                $this->error($message);
            }

            return;
        }

        $server = (new ServerRepository())->create($data);

        $this->info("New server added with id {$server->id}.");

        if ($this->confirm('Do you like to run a new check?', TRUE)) {
            \Artisan::call('run:checks');
        }
    }
}
