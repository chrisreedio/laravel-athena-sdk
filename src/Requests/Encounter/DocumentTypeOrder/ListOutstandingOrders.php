<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeOrder;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOutstandingOrders
 *
 * BETA: Retrieves the list of patient's orders whose dates are as of today or earlier.
 */
class ListOutstandingOrders extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/orders/outstanding';
    }

    /**
     * @param  null|bool  $showdeclinedorders If set, include orders that were declined
     * @param  null|int  $departmentid The athenaNet department ID.
     * @param  null|int  $patientid The athena patient ID.
     * @param  null|int  $encounterid The ID for the clinical encounter the outstanding order was created in or the ID of the clinical encounter that the order will be performed in.
     */
    public function __construct(
        protected ?bool $showdeclinedorders = null,
        protected ?int $departmentid = null,
        protected ?int $patientid = null,
        protected ?int $encounterid = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'showdeclinedorders' => $this->showdeclinedorders,
            'departmentid' => $this->departmentid,
            'patientid' => $this->patientid,
            'encounterid' => $this->encounterid,
        ]);
    }
}
