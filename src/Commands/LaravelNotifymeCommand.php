<?php

namespace YacineDiaf\LaravelNotifyme\Commands;

use Illuminate\Console\Command;

class LaravelNotifymeCommand extends Command
{
    public $signature = 'laravel-notifyme';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
