<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePatientCase;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientCaseActionNote
 *
 * Retrieves action note information of a specific patient case document
 */
class GetPatientCaseActionNote extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/patientcase/{$this->patientcaseid}/actions";
    }

    /**
     * @param  int  $patientcaseid patientcaseid
     */
    public function __construct(
        protected int $patientcaseid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
