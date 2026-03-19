<?php

namespace ChrisReedIO\AthenaSDK\Resources\Patients;

use ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\ReferralAuthorization\ListReferralAuths;
use ChrisReedIO\AthenaSDK\Resource;

class ReferralAuthorizations extends Resource
{
    public function __construct($connector, protected int $patientId)
    {
        parent::__construct($connector);
    }

    public function list(
        ?bool $showExpired = null,
        ?int $insuranceId = null,
    ): array {
        $request = new ListReferralAuths(
            patientid: $this->patientId,
            insuranceid: $insuranceId,
            showexpired: $showExpired,
        );

        return $this->connector->send($request)->dtoOrFail();
    }
}
