use Illuminate\Console\Scheduling\Schedule;
Schedule::command('sample:command')
->everyMinute()