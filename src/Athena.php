<?php

namespace ChrisReedIO\AthenaSDK;

// use ChrisReedIO\AthenaSDK\Resource\Appointments;
use Saloon\Http\Connector;

class Athena extends Connector
{
    protected ?string $baseUrl = null;

    public function __construct(protected ?string $practiceId = null)
    {
        $this->baseUrl = config('athena-sdk.base_url');
        if (empty($this->baseUrl)) {
            throw new \Exception('Athena SDK base_url not set in config/athena-sdk.php');
        }

        $this->practiceId ??= config('athena-sdk.practice_id');
        if (empty($this->practiceId)) {
            throw new \Exception('Athena SDK practice_id not set in config/athena-sdk.php');
        }
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl . '/v1/' . $this->practiceId;
    }

    // public function appointments(): Appointments
    // {
    //     return new Appointments($this);
    // }
}
