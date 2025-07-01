Schedule::command('sample:command')
->everyMinute()
->sendOutputTo(storage_path('logs/sample_command.log'))
->emailOutputTo('josephoai209@gmail.com')