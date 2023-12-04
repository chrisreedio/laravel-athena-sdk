<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Payment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientPaymentHistory
 *
 * Retrieves payment history information for the list of patients
 */
class ListPatientPaymentHistory extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/patients/paymenthistory';
    }

    /**
     * @param  null|bool  $additionalpaymentinfo Get additional payment information includes date of service, original plan, supervising provider.
     * @param  array  $patientidlist Array of Patient IDs
     * @param  string  $enddate End date
     * @param  string  $startdate Start Date
     */
    public function __construct(
        protected ?bool $additionalpaymentinfo,
        protected array $patientidlist,
        protected string $enddate,
        protected string $startdate,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'additionalpaymentinfo' => $this->additionalpaymentinfo,
            'patientidlist' => $this->patientidlist,
            'enddate' => $this->enddate,
            'startdate' => $this->startdate,
        ]);
    }
}
