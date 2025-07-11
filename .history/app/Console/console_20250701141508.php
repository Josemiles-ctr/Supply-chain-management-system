use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

<?php


$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(ConsoleKernel::class);

$status = $kernel->handle(
    $input = new Symfony\Component\Console\Input\ArgvInput,
    new Symfony\Component\Console\Output\ConsoleOutput
);

$kernel->terminate($input, $status);

exit($status);