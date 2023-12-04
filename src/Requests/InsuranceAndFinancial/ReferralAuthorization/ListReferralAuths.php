<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\ReferralAuthorization;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListReferralAuths
 *
 * Retrieves the list of authorizations and referrals for a specific patient
 */
class ListReferralAuths extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/referralauths";
    }

    /**
     * @param int $patientid patientid
     * @param null|int $insuranceid The insurance ID.
     * @param null|bool $showexpired If set, results will include expired authorizations/referrals. This defaults to false.
     */
    public function __construct(
        protected int   $patientid,
        protected ?int  $insuranceid = null,
        protected ?bool $showexpired = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'insuranceid' => $this->insuranceid,
            'showexpired' => $this->showexpired
        ]);
    }
}
