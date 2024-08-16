<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // The name and signature of the console command.
    protected $signature = 'init';

    // The console command description.
    protected $description = 'Run cache, config, route, and view clear commands';

    // Execute the console command.
    public function handle()
    {
        $this->call('cache:clear');
        $this->info('Cache cleared');

        $this->call('config:clear');
        $this->info('Config cleared');

        $this->call('route:clear');
        $this->info('Routes cleared');

        $this->call('view:clear');
        $this->info('Views cleared');

        $this->info('Initialization complete.');
    }
}
