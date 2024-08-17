<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupInitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Run the migrations
        $this->call('migrate');
        $this->info('Migrations run successfully.');

        // Run the database seeds
        $this->call('db:seed');
        $this->info('Database seeding completed.');

        $this->info('Your application is ready to use.');
    }
}
git
