<?php

namespace ChrisReedIO\AthenaSDK\Resources\Patients;

use ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\PatientInsurance\ListPatientInsurances;
use ChrisReedIO\AthenaSDK\Resource;

class PatientInsurances extends Resource
{
    public function __construct($connector, protected int $patientId)
    {
        parent::__construct($connector);
    }

    public function list(
        ?int $departmentId = null,
        ?bool $ignoreRestrictions = null,
        ?bool $showCancelled = null,
        ?bool $showFullSsn = null,
    ): array {
        $request = new ListPatientInsurances(
            patientid: $this->patientId,
            departmentid: $departmentId,
            ignorerestrictions: $ignoreRestrictions,
            showcancelled: $showCancelled,
            showfullssn: $showFullSsn,
        );

        return $this->connector->send($request)->dtoOrFail();
    }
}
