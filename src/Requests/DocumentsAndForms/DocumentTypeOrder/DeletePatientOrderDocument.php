<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeOrder;

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
     * @param  int  $patientid patientid
     * @param  int  $orderid orderid
     */
    public function __construct(
        protected int $patientid,
        protected int $orderid,
    ) {
    }
}