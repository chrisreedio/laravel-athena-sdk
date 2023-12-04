<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Payment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateVendorAdjustingCharges
 *
 * This API will allow third party vendors to adjust off any portion of a patient balance on each
 * charge line. Note that each adjustment can not exceed the total outstanding charge amount. This
 * endpoint can be used for scenarios where third party vendors may offer discounts (e.g. when a
 * payment is made in full within a certain timeframe). Note that if all charges of a claim are fully
 * adjusted off, the claim will be moved to 'CLOSED'.
 */
class CreateVendorAdjustingCharges extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patientpayvendors/{$this->vendorcode}/adjustingcharges";
    }

    /**
     * @param  number  $patientid Patient ID
     * @param  string  $vendorcode vendorcode
     */
    public function __construct(
        protected array $charges,
        protected \number $patientid,
        protected string $vendorcode,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'charges' => $this->charges,
            'patientid' => $this->patientid,
        ]);
    }
}
