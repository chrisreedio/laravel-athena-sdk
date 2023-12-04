<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Claim;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateAppointmentClaim
 *
 * Create a new claim record for an appointment
 */
class CreateAppointmentClaim extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/claim";
    }

    /**
     * @param int $appointmentid appointmentid
     * @param array $claimcharges List of charges for this claim. This should be a JSON string representing an array of charge objects. A primary ICD-10 code (e.g. ICD10CODE1) is required.  ICD-9 codes may also be passed, in the rare case that the payer for the claim still needs that information. The /feeschedules/checkprocedure call may be used to verify a particular PROCEDURECODE is valid for a practice before attempting claim creation.  Claims can only be created for appointments that do not already have a claim, are not already in status 4, and have already been checked in.
     * @param null|array $servicetypeaddons Array of service type add-ons (STAOs) for the claim. Some claim level STAO fields do not support multiple values. These fields will save only the first value if more than one is passed in.
     * @param null|int $supervisingproviderid The supervising provider ID.  Defaults to the supervising provider of the appointment.
     */
    public function __construct(
        protected int    $appointmentid,
        protected array  $claimcharges,
        protected ?array $servicetypeaddons = null,
        protected ?int   $supervisingproviderid = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'claimcharges' => $this->claimcharges,
            'servicetypeaddons' => $this->servicetypeaddons,
            'supervisingproviderid' => $this->supervisingproviderid,
        ]);
    }
}
