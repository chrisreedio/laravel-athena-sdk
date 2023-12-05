<?php

namespace ChrisReedIO\AthenaSDK\Resources;

use ChrisReedIO\AthenaSDK\Requests\Patient\Patient\GetPatient;
use ChrisReedIO\AthenaSDK\Requests\Patient\Patient\ListPatients;
use ChrisReedIO\AthenaSDK\Resource;
use Illuminate\Support\LazyCollection;
use Saloon\Http\Response;

class Patients extends Resource
{
    // public function list(
    //     ?string $departmentId = null,
    // ): LazyCollection
    // {
    //     return $this->connector->paginate(new ListPatients(departmentid: $departmentId))->collect();
    // }

    public function list(
        string $departmentId = null,
    ): Response {
        return $this->connector->send(new ListPatients(departmentid: $departmentId));
    }

    public function get(
        int $patientId
    ) : Response {
        return $this->connector->send(new GetPatient($patientId));
    }
}
