<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

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
        $this->info('Running composer install...');
        $process = new Process(['composer', 'install']);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $this->info('Composer install completed.');

        // Copy .env.example to .env
        if (!file_exists(base_path('.env'))) {
            $this->info('Copying .env.example to .env...');
            copy(base_path('.env.example'), base_path('.env'));
            $this->info('.env file created.');
        } else {
            $this->info('.env file already exists. Skipping copy.');
        }
    }
}
