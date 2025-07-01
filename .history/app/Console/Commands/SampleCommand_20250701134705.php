<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

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
        
        $count= User::count();
        $this->info("Total number of users: {$count}");
        Mail::to('josephoai209@gmail.com')->send(new SampleCommandMail($count));
    }
}