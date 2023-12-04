<?php

namespace ChrisReedIO\AthenaSDK;

use ChrisReedIO\AthenaSDK\Resource\Appointments;
use Saloon\Http\Connector;

class Athena extends Connector
{
    public function resolveBaseUrl(): string
    {
        return 'https://api.preview.platform.athenahealth.com';
    }

    public function appointments(): Appointments
    {
        return new Appointments($this);
    }
}
