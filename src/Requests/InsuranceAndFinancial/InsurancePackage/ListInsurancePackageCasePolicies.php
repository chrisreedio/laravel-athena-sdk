<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\InsurancePackage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListInsurancePackageCasePolicies
 *
 * Retrieve case policies information for a specific payer
 */
class ListInsurancePackageCasePolicies extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/insurancepackages/casepolicies';
    }

    /**
     * @param  string  $insuranceplanname The name of the insurer.
     * @param  null|int  $casepolicytypeid Filter by a case policy type ID.
     * @param  null|string  $insuranceaddress The address of the insurer.
     * @param  null|string  $insurancecity The city of the insurer.
     * @param  null|string  $insurancephone The phone number of the insurer.
     * @param  null|string  $insurancestate The two letter state abbreviation of the insurer.
     * @param  null|string  $insurancezip The zipcode of the insurer. Nine digit zipcodes are accepted in the format of 12345-6789.
     */
    public function __construct(
        protected string $insuranceplanname,
        protected ?int $casepolicytypeid = null,
        protected ?string $insuranceaddress = null,
        protected ?string $insurancecity = null,
        protected ?string $insurancephone = null,
        protected ?string $insurancestate = null,
        protected ?string $insurancezip = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'insuranceplanname' => $this->insuranceplanname,
            'casepolicytypeid' => $this->casepolicytypeid,
            'insuranceaddress' => $this->insuranceaddress,
            'insurancecity' => $this->insurancecity,
            'insurancephone' => $this->insurancephone,
            'insurancestate' => $this->insurancestate,
            'insurancezip' => $this->insurancezip,
        ]);
    }
}
