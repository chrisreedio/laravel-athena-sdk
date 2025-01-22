<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderOtherOrder;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateEncounterOrderOther
 *
 * Creates a new nonstandard order record for a specific encounter
 */
class CreateEncounterOrderOther extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/orders/other";
    }

    /**
     * @param  int  $diagnosissnomedcode  The SNOMED code for diagnosis this order is for.
     * @param  int  $encounterid  encounterid
     * @param  int  $ordertypeid  The athena ID of the type of order. Get the IDs using /reference/order/other.
     * @param  null|int  $facilityid  The athena ID of the facility you want to send the order to. Get a localized list using /chart/configuration/facilities.
     * @param  null|string  $facilitynote  A note to send to the facility.
     * @param  null|bool  $highpriority  If true, then the order should be sent STAT.
     * @param  null|string  $providernote  An internal note for the provider or staff.
     */
    public function __construct(
        protected int $diagnosissnomedcode,
        protected int $encounterid,
        protected int $ordertypeid,
        protected ?int $facilityid = null,
        protected ?string $facilitynote = null,
        protected ?bool $highpriority = null,
        protected ?string $providernote = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'diagnosissnomedcode' => $this->diagnosissnomedcode,
            'ordertypeid' => $this->ordertypeid,
            'facilityid' => $this->facilityid,
            'facilitynote' => $this->facilitynote,
            'highpriority' => $this->highpriority,
            'providernote' => $this->providernote,
        ]);
    }
}
