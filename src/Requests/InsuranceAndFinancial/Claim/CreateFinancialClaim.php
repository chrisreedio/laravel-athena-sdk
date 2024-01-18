<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Claim;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateFinancialClaim
 *
 * Create a new claim
 */
class CreateFinancialClaim extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/claims';
    }

    /**
     * @param  array  $claimcharges  List of charges for this claim. This should be a JSON string representing an array of charge objects. A primary ICD-10 code (e.g. ICD10CODE1) is required.  ICD-9 codes may also be passed, in the rare case that the payer for the claim still needs that information. The /feeschedules/checkprocedure call may be used to verify a particular PROCEDURECODE is valid for a practice before attempting claim creation.
     * @param  int  $departmentid  The department ID.
     * @param  int  $patientid  The patient ID.
     * @param  int  $supervisingproviderid  The supervising provider ID.
     * @param  null|array  $customfields  A list of custom field JSON objects to populate on creation of a claim.
     * @param  null|int  $orderingproviderid  The ordering provider ID. 'Ordering Provider' service type add-on must be enabled. Default is no ordering provider ID. Any entry in this field will override any ordering provider ID in the service type add-ons field.
     * @param  null|int  $primarypatientinsuranceid  The athena primary patient insurance ID.  Defaults to the patient's active primary insurance.
     * @param  null|int  $referralauthid  The referral authorization ID.
     * @param  null|int  $referringproviderid  The referring provider id. Default is no referring provider ID.
     * @param  null|int  $renderingproviderid  The rendering provider ID.  Defaults to value passed for supervising provider ID.
     * @param  null|string  $reserved19  Text to include in the Reserved 19 field. Limited to 48 characters. Default is an empty string.
     * @param  null|int  $secondarypatientinsuranceid  The athena secondary patient insurance ID.  Defaults to the patient's active secondary insurance.
     * @param  null|string  $servicedate  A date string that corresponds with when the patient was seen. The date must be today or in the past. By default we will use today's date.
     * @param  null|array  $servicetypeaddons  Array of service type add-ons (STAOs) for the claim. Some claim level STAO fields do not support multiple values. These fields will save only the first value if more than one is passed in.
     */
    public function __construct(
        protected array $claimcharges,
        protected int $departmentid,
        protected int $patientid,
        protected int $supervisingproviderid,
        protected ?array $customfields = null,
        protected ?int $orderingproviderid = null,
        protected ?int $primarypatientinsuranceid = null,
        protected ?int $referralauthid = null,
        protected ?int $referringproviderid = null,
        protected ?int $renderingproviderid = null,
        protected ?string $reserved19 = null,
        protected ?int $secondarypatientinsuranceid = null,
        protected ?string $servicedate = null,
        protected ?array $servicetypeaddons = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'claimcharges' => $this->claimcharges,
            'departmentid' => $this->departmentid,
            'patientid' => $this->patientid,
            'supervisingproviderid' => $this->supervisingproviderid,
            'customfields' => $this->customfields,
            'orderingproviderid' => $this->orderingproviderid,
            'primarypatientinsuranceid' => $this->primarypatientinsuranceid,
            'referralauthid' => $this->referralauthid,
            'referringproviderid' => $this->referringproviderid,
            'renderingproviderid' => $this->renderingproviderid,
            'reserved19' => $this->reserved19,
            'secondarypatientinsuranceid' => $this->secondarypatientinsuranceid,
            'servicedate' => $this->servicedate,
            'servicetypeaddons' => $this->servicetypeaddons,
        ]);
    }
}
