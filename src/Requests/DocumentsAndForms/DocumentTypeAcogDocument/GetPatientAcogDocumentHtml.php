<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeAcogDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientAcogDocumentHtml
 *
 * Retrieves a specific ACOG document of the patient in HTML format
 */
class GetPatientAcogDocumentHtml extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/acog/{$this->acogid}/html";
    }

    /**
     * @param  int  $acogid acogid
     * @param  int  $patientid patientid
     * @param  null|bool  $includewrapper If true, will include a wrapper with standard HTML tags
     */
    public function __construct(
        protected int $acogid,
        protected int $patientid,
        protected ?bool $includewrapper = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['includewrapper' => $this->includewrapper]);
    }
}
