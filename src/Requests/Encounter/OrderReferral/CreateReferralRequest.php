<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderReferral;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateReferralRequest
 *
 * Creates a new referral request record
 */
class CreateReferralRequest extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/orders/referral";
    }

    /**
     * @param  int  $diagnosissnomedcode  The SNOMED code for diagnosis this order is for.
     * @param  int  $encounterid  encounterid
     * @param  int  $ordertypeid  The athena ID of the referral type.
     * @param  null|string  $dateofservice  The date of service of the referral order. Replaces the startdate attribute. (This attribute is being rolled out, and will be generally available by the end of 2024.)
     * @param  null|int  $facilityid  The athena ID of the facility you want to send the order to. Get a localized list using /chart/configuration/facilities.
     * @param  null|string  $facilitynote  A note to send to the facility.
     * @param  null|string  $futuresubmitdate  The date the order should be sent. Defaults to today.
     * @param  null|bool  $highpriority  If true, then the order should be sent STAT.
     * @param  null|array  $insurances  Insurances used in prior authorization of the order. Practices with the Authorization Management Service enabled cannot set insurances; filling in this field will result in an error if that practice setting is ON. (This attribute is being rolled out, and will be generally available by the end of 2024.)
     * @param  null|string  $notetopatient  If this referral has a field for 'Notes to Patient' you may fill it in with this parameter. If the referral does not have this field available, this will error.
     * @param  null|string  $procedurecode  (DEPRECATED - has been replaced by procedurecodes.) If this referral has a field for 'Procedure Code' you may fill it in with this parameter.  If the referral does not have this field available, this will error.
     * @param  null|array  $procedurecodes  The list of procedure codes. Replaces the procedurecode input. (This attribute is being rolled out, and will be generally available by the end of 2024.)
     * @param  null|string  $providernote  An internal note for the provider or staff.
     * @param  null|string  $reasonforreferral  If this referral has a field for 'Reason for Referral' you may fill it in with this parameter. If the referral does not have this field available, this will error.
     * @param  null|int  $requestedvisits  The requested number of visits for the referral order. (This attribute is being rolled out, and will be generally available by the end of 2024.)
     * @param  null|string  $startdate  (DEPRECATED - has been replaced by dateofservice.) If this referral has a field for 'Start Date' you may fill it in with this parameter.  If the referral does not have this field available, this will error.
     */
    public function __construct(
        protected int $diagnosissnomedcode,
        protected int $encounterid,
        protected int $ordertypeid,
        protected ?string $dateofservice = null,
        protected ?int $facilityid = null,
        protected ?string $facilitynote = null,
        protected ?string $futuresubmitdate = null,
        protected ?bool $highpriority = null,
        protected ?array $insurances = null,
        protected ?string $notetopatient = null,
        protected ?string $procedurecode = null,
        protected ?array $procedurecodes = null,
        protected ?string $providernote = null,
        protected ?string $reasonforreferral = null,
        protected ?int $requestedvisits = null,
        protected ?string $startdate = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'diagnosissnomedcode' => $this->diagnosissnomedcode,
            'ordertypeid' => $this->ordertypeid,
            'dateofservice' => $this->dateofservice,
            'facilityid' => $this->facilityid,
            'facilitynote' => $this->facilitynote,
            'futuresubmitdate' => $this->futuresubmitdate,
            'highpriority' => $this->highpriority,
            'insurances' => $this->insurances,
            'notetopatient' => $this->notetopatient,
            'procedurecode' => $this->procedurecode,
            'procedurecodes' => $this->procedurecodes,
            'providernote' => $this->providernote,
            'reasonforreferral' => $this->reasonforreferral,
            'requestedvisits' => $this->requestedvisits,
            'startdate' => $this->startdate,
        ]);
    }
}
