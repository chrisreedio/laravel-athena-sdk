<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeAdminDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientAdminDocument
 *
 * Retrieves the data from a specific admin document of a patient
 */
class GetPatientAdminDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/admin/{$this->adminid}";
    }

    /**
     * @param  int  $adminid  adminid
     * @param  int  $patientid  patientid
     * @param  null|bool  $getentityinfo  If true, entityid and entitytype will be returned. entityid will be populated in createduser attribute.
     */
    public function __construct(
        protected int $adminid,
        protected int $patientid,
        protected ?bool $getentityinfo = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['getentityinfo' => $this->getentityinfo]);
    }
}
