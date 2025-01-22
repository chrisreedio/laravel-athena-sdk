<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeMedicalRecord;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetOriginalMedicalRecordDocument
 *
 * Retrieves original medical record document of the patient. This is applicable when document source
 * is FAX or UPLOAD and originally faxed or uploaded file is not split into multiple documents. Please
 * use "Get page from patient's medical record document" endpoint to download documentpages when
 * original document is not available.
 */
class GetOriginalMedicalRecordDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/medicalrecord/{$this->medicalrecordid}/originaldocument";
    }

    /**
     * @param  int  $medicalrecordid  medicalrecordid
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected int $medicalrecordid,
        protected int $patientid,
    ) {}
}
