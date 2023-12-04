<?php

namespace ChrisReedIO\AthenaSDK\Commands;

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
