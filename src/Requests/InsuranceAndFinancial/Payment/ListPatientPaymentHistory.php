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
     * @param  array  $patientidlist  Array of Patient IDs
     * @param  string  $startdate  Start Date
     * @param  string  $enddate  End date
     * @param  null|bool  $additionalpaymentinfo  Get additional payment information includes date of service, original plan, supervising provider.
     */
    public function __construct(
        protected array $patientidlist,
        protected string $startdate,
        protected string $enddate,
        protected ?bool $additionalpaymentinfo = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'patientidlist' => $this->patientidlist,
            'startdate' => $this->startdate,
            'enddate' => $this->enddate,
            'additionalpaymentinfo' => $this->additionalpaymentinfo,
        ]);
    }
}
