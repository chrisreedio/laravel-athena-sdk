<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderPatientInfoOrder;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateEncounterPatientInfoOrder
 *
 * Adds a new patient info order for a given encounter
 */
class CreateEncounterPatientInfoOrder extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/orders/patientinfo";
    }

    /**
     * @param  int  $encounterid encounterid
     * @param  int  $ordertypeid The athena ID of the patient information to order. Get the IDs using /reference/order/patientinfo.
     * @param  int  $diagnosissnomedcode The SNOMED code for diagnosis this order is for.
     * @param  null|string  $externalnote An external note for the patient.
     * @param  null|string  $providernote An internal note for the provider or staff.
     */
    public function __construct(
        protected int $encounterid,
        protected int $ordertypeid,
        protected int $diagnosissnomedcode,
        protected ?string $externalnote = null,
        protected ?string $providernote = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'ordertypeid' => $this->ordertypeid,
            'diagnosissnomedcode' => $this->diagnosissnomedcode,
            'externalnote' => $this->externalnote,
            'providernote' => $this->providernote,
        ]);
    }
}
