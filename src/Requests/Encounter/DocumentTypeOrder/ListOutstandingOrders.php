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
     * @param  null|int  $departmentid  The athenaNet department ID.
     * @param  null|int  $encounterid  The ID for the clinical encounter the outstanding order was created in or the ID of the clinical encounter that the order will be performed in.
     * @param  null|int  $patientid  The athena patient ID.
     * @param  null|bool  $showdeclinedorders  If set, include orders that were declined
     */
    public function __construct(
        protected ?int $departmentid = null,
        protected ?int $encounterid = null,
        protected ?int $patientid = null,
        protected ?bool $showdeclinedorders = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'encounterid' => $this->encounterid,
            'patientid' => $this->patientid,
            'showdeclinedorders' => $this->showdeclinedorders,
        ]);
    }
}
