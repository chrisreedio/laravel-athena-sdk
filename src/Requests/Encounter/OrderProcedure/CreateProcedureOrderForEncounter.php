<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderProcedure;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateProcedureOrderForEncounter
 *
 * Creates a new order for surgery or a procedures
 */
class CreateProcedureOrderForEncounter extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/orders/procedure";
    }

    /**
     * @param  int  $diagnosissnomedcode  The SNOMED code for diagnosis this order is for.
     * @param  int  $encounterid  encounterid
     * @param  int  $ordertypeid  The athena ID of the surgery/procedure order type.
     * @param  null|string  $dateofprocedure  The date of the surgery/procedure order. (This attribute is being rolled out, and will be generally available by the end of 2024.)
     * @param  null|int  $facilityid  The athena ID of the facility you want to send the order to. Get a localized list using /chart/configuration/facilities.
     * @param  null|string  $facilitynote  A note to send to the performing provider or facility.
     * @param  null|string  $futuresubmitdate  The date the order should be performed or sent. Defaults to today.
     * @param  null|bool  $highpriority  If true, then the order should be sent STAT.
     * @param  null|array  $insurances  Insurances used in prior authorization of the order. Practices with the Authorization Management Service enabled cannot set insurances; filling in this field will result in an error if that practice setting is ON. (This attribute is being rolled out, and will be generally available by the end of 2024.)
     * @param  null|int  $placeofserviceid  The place of service of the order. (This attribute is being rolled out, and will be generally available by the end of 2024.) Based on CMS Place of Service Codes. ID must be 02, 10, 11, 12, 19, 21, 22, or 24 or else this will error. The mapping of IDs to names is as follows. 02: TELEHEALTH - OTHER, 10: TELEHEALTH - PATIENTS HOME, 11: OFFICE, 12: PATIENTS HOME, 19: OFF CAMPUS-OUTPATIENT HOSPITAL, 21: INPATIENT HOSPITAL, 22: ON CAMPUS-OUTPATIENT HOSPITAL, 24: AMBULATORY SURGICAL CENTER.
     * @param  null|array  $procedurecodes  The list of procedure codes. (This attribute is being rolled out, and will be generally available by the end of 2024.)
     * @param  null|string  $providernote  An internal note for the provider or staff.
     */
    public function __construct(
        protected int $diagnosissnomedcode,
        protected int $encounterid,
        protected int $ordertypeid,
        protected ?string $dateofprocedure = null,
        protected ?int $facilityid = null,
        protected ?string $facilitynote = null,
        protected ?string $futuresubmitdate = null,
        protected ?bool $highpriority = null,
        protected ?array $insurances = null,
        protected ?int $placeofserviceid = null,
        protected ?array $procedurecodes = null,
        protected ?string $providernote = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'diagnosissnomedcode' => $this->diagnosissnomedcode,
            'ordertypeid' => $this->ordertypeid,
            'dateofprocedure' => $this->dateofprocedure,
            'facilityid' => $this->facilityid,
            'facilitynote' => $this->facilitynote,
            'futuresubmitdate' => $this->futuresubmitdate,
            'highpriority' => $this->highpriority,
            'insurances' => $this->insurances,
            'placeofserviceid' => $this->placeofserviceid,
            'procedurecodes' => $this->procedurecodes,
            'providernote' => $this->providernote,
        ]);
    }
}
