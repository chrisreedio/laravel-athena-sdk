<?php

namespace ChrisReedIO\Athena\Commands;

use Illuminate\Console\Command;

class AthenaCommand extends Command
{
    public $signature = 'laravel-athena-sdk';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
