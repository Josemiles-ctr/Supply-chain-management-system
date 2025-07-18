<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Mail\SampleReportMail;
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
        $this->info('Executing the sample command...');
        $count= User::count();
        $this->info("Total number of users: {$count}");
        Mail::to('josephotai209@gmail.com')->send(new SampleReportMail($count));
    }
}