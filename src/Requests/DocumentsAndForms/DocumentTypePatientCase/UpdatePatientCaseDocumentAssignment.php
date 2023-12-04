<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePatientCase;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientCaseDocumentAssignment
 *
 * Reassigns a specific patient case document
 */
class UpdatePatientCaseDocumentAssignment extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/patientcase/{$this->patientcaseid}/assign";
    }

    /**
     * @param int $patientcaseid patientcaseid
     * @param int $patientid patientid
     * @param string $username AthenNet user to whom the case is being reassigned to.This parameter is case-sensitive.
     */
    public function __construct(
        protected int    $patientcaseid,
        protected int    $patientid,
        protected string $username,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter(['username' => $this->username]);
    }
}
