<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeOrder;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientOrderDocument
 *
 * Deletes the record of a specified order
 */
class DeletePatientOrderDocument extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/order/{$this->orderid}";
    }

    /**
     * @param int $orderid orderid
     * @param int $patientid patientid
     */
    public function __construct(
        protected int $orderid,
        protected int $patientid,
    )
    {
    }
}
