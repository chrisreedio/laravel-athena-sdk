<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderDurableMedicalEquipmentDme;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateEncounterDmeOrder
 *
 * Creates a record of a DME order for a given ordertype to be rendered by a specific facility
 */
class CreateEncounterDmeOrder extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/orders/dme";
    }

    /**
     * @param  int  $diagnosissnomedcode The SNOMED code for diagnosis this order is for.
     * @param  int  $encounterid encounterid
     * @param  int  $ordertypeid The athena ID of the DME to order. Get the IDs using /reference/order/dme
     * @param  null|bool  $dispenseaswritten Whether the DME should be marked as dispense as written (i.e., no substitutions without consulting the doctor).
     * @param  null|string  $facilityid The athena id of the supplier you want to send the prescription to. Defaults to the patient default supplier. Get a localized list using /chart/configuration/facilities.
     * @param  null|string  $facilitynote A note to send to the supplying facility.
     * @param  null|int  $numrefillsallowed The number of refills allowed for this DME. Defaults to 0.
     * @param  null|string  $orderingmode Selects whether you wish to prescribe, or dispense this DME.
     * @param  null|string  $providernote An internal note for the provider or staff.
     * @param  null|number  $totalquantity The total amount of units of the DME being prescribed.
     * @param  null|string  $unstructuredsig The unstructured sig.
     */
    public function __construct(
        protected int $diagnosissnomedcode,
        protected int $encounterid,
        protected int $ordertypeid,
        protected ?bool $dispenseaswritten = null,
        protected ?string $facilityid = null,
        protected ?string $facilitynote = null,
        protected ?int $numrefillsallowed = null,
        protected ?string $orderingmode = null,
        protected ?string $providernote = null,
        protected ?\number $totalquantity = null,
        protected ?string $unstructuredsig = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'diagnosissnomedcode' => $this->diagnosissnomedcode,
            'ordertypeid' => $this->ordertypeid,
            'dispenseaswritten' => $this->dispenseaswritten,
            'facilityid' => $this->facilityid,
            'facilitynote' => $this->facilitynote,
            'numrefillsallowed' => $this->numrefillsallowed,
            'orderingmode' => $this->orderingmode,
            'providernote' => $this->providernote,
            'totalquantity' => $this->totalquantity,
            'unstructuredsig' => $this->unstructuredsig,
        ]);
    }
}
