<?php

namespace ChrisReedIO\AthenaSDK\Resources;

use ChrisReedIO\AthenaSDK\Requests\Encounter\Encounter\UpdatePatientEncounter;
use ChrisReedIO\AthenaSDK\Resource;
use ChrisReedIO\AthenaSDK\Resources\Encounters\PatientStatus;
use InvalidArgumentException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class Encounters extends Resource
{
    public function statuses(): PatientStatus
    {
        return new PatientStatus($this->connector);
    }

    /**
     * @throws InvalidArgumentException
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function update(int $encounterId, ?int $patientLocationId = null, ?int $patientStatusId = null): bool
    {
        if ($patientStatusId === null && $patientLocationId === null) {
            throw new InvalidArgumentException('Either patientStatusId or patientLocationId must be provided');
        }

        $response = $this->connector->send(new UpdatePatientEncounter($encounterId, $patientLocationId, $patientStatusId));

        return $response->successful();
    }
}
