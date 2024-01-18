<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\PrepaymentPlan;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientPrepaymentPlans
 *
 * This API returns the non-deleted prepayment plans for the given patient, along with a list of linked
 * claims for each.
 */
class ListPatientPrepaymentPlans extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/prepaymentplans";
    }

    /**
     * @param  int  $patientid  patientid
     * @param  null|array  $prepaymentplanids  array of plan IDs to retrieve
     */
    public function __construct(
        protected int $patientid,
        protected ?array $prepaymentplanids = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['prepaymentplanids' => $this->prepaymentplanids]);
    }
}
