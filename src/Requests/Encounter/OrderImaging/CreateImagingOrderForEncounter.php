<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderImaging;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateImagingOrderForEncounter
 *
 * Creates a new imaging order record for a specific encounter
 */
class CreateImagingOrderForEncounter extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/orders/imaging";
    }

    /**
     * @param  int  $diagnosissnomedcode  The SNOMED code for diagnosis this order is for.
     * @param  int  $encounterid  encounterid
     * @param  int  $ordertypeid  The athena ID of the imaging study to order. Get the IDs using /reference/order/imaging.
     * @param  null|string  $dateofimaging  The date of the imaging order. (This attribute is being rolled out, and will be generally available by the end of 2024.)
     * @param  null|int  $facilityid  The athena ID of the imaging center you want to send the order to. Get a localized list using /chart/configuration/facilities.
     * @param  null|string  $facilitynote  A note to send to the imaging center.
     * @param  null|string  $futuresubmitdate  The date the order should be sent. Defaults to today.
     * @param  null|bool  $highpriority  If true, then the order should be sent STAT.
     * @param  null|array  $insurances  Insurances used in prior authorization of the order. Practices with the Authorization Management Service enabled cannot set insurances; filling in this field will result in an error if that practice setting is ON. (This attribute is being rolled out, and will be generally available by the end of 2024.)
     * @param  null|array  $procedurecodes  The list of procedure codes. (This attribute is being rolled out, and will be generally available by the end of 2024.)
     * @param  null|string  $providernote  An internal note for the provider or staff.
     */
    public function __construct(
        protected int $diagnosissnomedcode,
        protected int $encounterid,
        protected int $ordertypeid,
        protected ?string $dateofimaging = null,
        protected ?int $facilityid = null,
        protected ?string $facilitynote = null,
        protected ?string $futuresubmitdate = null,
        protected ?bool $highpriority = null,
        protected ?array $insurances = null,
        protected ?array $procedurecodes = null,
        protected ?string $providernote = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'diagnosissnomedcode' => $this->diagnosissnomedcode,
            'ordertypeid' => $this->ordertypeid,
            'dateofimaging' => $this->dateofimaging,
            'facilityid' => $this->facilityid,
            'facilitynote' => $this->facilitynote,
            'futuresubmitdate' => $this->futuresubmitdate,
            'highpriority' => $this->highpriority,
            'insurances' => $this->insurances,
            'procedurecodes' => $this->procedurecodes,
            'providernote' => $this->providernote,
        ]);
    }
}
