<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SampleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sample:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is the sample command for demonstration purposes.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Sample command executed successfully.');
    }
}