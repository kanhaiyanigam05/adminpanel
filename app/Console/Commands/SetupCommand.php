<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup';

    // The console command description.
    protected $description = 'Setup Your Application';

    // Execute the console command.
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
