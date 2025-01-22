<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\InsurancePackage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListInsurancePackages
 *
 * Retrieve list of insurance packages for a given search criteria
 */
class ListInsurancePackages extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/insurancepackages';
    }

    /**
     * @param  string  $insuranceplanname  The name of the insurer.
     * @param  string  $memberid  The patient's insurance member ID.
     * @param  null|string  $insuranceaddress  The address of the insurer.
     * @param  null|string  $insurancecity  The city of the insurer.
     * @param  null|string  $insurancephone  The phone number of the insurer.
     * @param  null|string  $insurancestate  The two letter state abbreviation of the insurer's location.
     * @param  null|string  $insurancezip  The zipcode of the insurer. Nine digit zipcodes are accepted in the format of 12345-6789.
     * @param  null|array  $producttypeid  The insurance product type ID.
     * @param  null|string  $stateofcoverage  Two letter state abbreviation that filters for insurances that cover this state.
     */
    public function __construct(
        protected string $insuranceplanname,
        protected string $memberid,
        protected ?string $insuranceaddress = null,
        protected ?string $insurancecity = null,
        protected ?string $insurancephone = null,
        protected ?string $insurancestate = null,
        protected ?string $insurancezip = null,
        protected ?array $producttypeid = null,
        protected ?string $stateofcoverage = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'insuranceplanname' => $this->insuranceplanname,
            'memberid' => $this->memberid,
            'insuranceaddress' => $this->insuranceaddress,
            'insurancecity' => $this->insurancecity,
            'insurancephone' => $this->insurancephone,
            'insurancestate' => $this->insurancestate,
            'insurancezip' => $this->insurancezip,
            'producttypeid' => $this->producttypeid,
            'stateofcoverage' => $this->stateofcoverage,
        ]);
    }
}
