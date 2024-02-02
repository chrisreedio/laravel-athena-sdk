<?php

namespace ChrisReedIO\AthenaSDK\Resources\Encounters;

use ChrisReedIO\AthenaSDK\Data\Practice\PatientStatusData;
use ChrisReedIO\AthenaSDK\Requests\Encounter\Chart\ListPatientStatuses;
use ChrisReedIO\AthenaSDK\Resource;
use Illuminate\Support\Collection;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class PatientStatus extends Resource
{
    /**
     * @return Collection<PatientStatusData>
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function list(): Collection
    {
        return $this->connector->send(new ListPatientStatuses())->dtoOrFail();
    }
}
