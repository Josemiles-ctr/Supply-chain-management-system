use Illuminate\Support\Facades\Schedule;
Schedule::command('sample:command')
->everyMinute()