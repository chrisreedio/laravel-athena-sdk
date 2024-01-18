<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderLab;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateEncounterLabOrders
 *
 * Creates a new imaging order record for a specific encounter
 */
class CreateEncounterLabOrders extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/orders/lab";
    }

    /**
     * @param  int  $diagnosissnomedcode  The SNOMED code for diagnosis this order is for.
     * @param  int  $encounterid  encounterid
     * @param  null|int  $facilityid  The athena ID of the lab you want to send the order to. Get a localized list using /chart/configuration/facilities.
     * @param  null|string  $facilitynote  A note to send to the lab.
     * @param  null|string  $futuresubmitdate  The date the order should be sent. Defaults to today.
     * @param  null|bool  $highpriority  If true, then the order should be sent STAT.
     * @param  null|string  $loinc  The LOINC of the lab you wish to order. Either this or ordertypeid can be used, but not both.
     * @param  null|int  $ordertypeid  The athena ID of the lab to order. Get the IDs using /reference/order/lab. Either this or LOINC can be used, but not both.
     * @param  null|string  $providernote  An internal note for the provider or staff.
     */
    public function __construct(
        protected int $diagnosissnomedcode,
        protected int $encounterid,
        protected ?int $facilityid = null,
        protected ?string $facilitynote = null,
        protected ?string $futuresubmitdate = null,
        protected ?bool $highpriority = null,
        protected ?string $loinc = null,
        protected ?int $ordertypeid = null,
        protected ?string $providernote = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'diagnosissnomedcode' => $this->diagnosissnomedcode,
            'facilityid' => $this->facilityid,
            'facilitynote' => $this->facilitynote,
            'futuresubmitdate' => $this->futuresubmitdate,
            'highpriority' => $this->highpriority,
            'loinc' => $this->loinc,
            'ordertypeid' => $this->ordertypeid,
            'providernote' => $this->providernote,
        ]);
    }
}
