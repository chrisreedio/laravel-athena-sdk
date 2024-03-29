<?php

namespace ChrisReedIO\AthenaSDK\Resources;

use ChrisReedIO\AthenaSDK\Data\Patient\PatientData;
use ChrisReedIO\AthenaSDK\Requests\Patient\GetPatient;
use ChrisReedIO\AthenaSDK\Requests\Patient\ListPatients;
use ChrisReedIO\AthenaSDK\Requests\Patient\UpdatePatient;
use ChrisReedIO\AthenaSDK\Resource;
use ChrisReedIO\AthenaSDK\Resources\Patients\ChartAlert;
use ChrisReedIO\AthenaSDK\Resources\Patients\PatientPrivacy;
use ChrisReedIO\AthenaSDK\Resources\Patients\PatientSubscriptions;
use Illuminate\Support\LazyCollection;
use Saloon\Http\Response;

class Patients extends Resource
{
    public function list(?string $departmentId = null): LazyCollection
    {
        return $this->connector->paginate(new ListPatients(departmentid: $departmentId))->collect();
    }

    // public function list(
    //     ?string $departmentId = null,
    // ): Response {
    //     return $this->connector->send(new ListPatients(departmentid: $departmentId));
    // }

    public function get(int $patientId): PatientData
    {
        return $this->connector->send(new GetPatient($patientId))->dtoOrFail();
    }

    public function subscriptions(): PatientSubscriptions
    {
        return new PatientSubscriptions($this->connector);
    }

    public function update(int $patientId, PatientData $patient): Response
    {
        return $this->connector->send(new UpdatePatient($patientId, $patient));
    }

    public function privacy(int $departmentId, int $patientId): PatientPrivacy
    {
        return new PatientPrivacy($this->connector, $departmentId, $patientId);
    }

    public function chartAlert(int $patientId, int $departmentId): ChartAlert
    {
        return new ChartAlert($this->connector, $patientId, $departmentId);
    }
}
