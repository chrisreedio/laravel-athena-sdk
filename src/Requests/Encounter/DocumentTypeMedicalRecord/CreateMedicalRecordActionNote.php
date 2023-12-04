<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeMedicalRecord;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateMedicalRecordActionNote
 *
 * Creates an action note for a specific medical record document
 */
class CreateMedicalRecordActionNote extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/medicalrecord/{$this->medicalrecordid}/actions";
    }

    /**
     * @param  int  $medicalrecordid medicalrecordid
     * @param  string  $actionnote The new action note to add to the document.
     */
    public function __construct(
        protected int $medicalrecordid,
        protected string $actionnote,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['actionnote' => $this->actionnote]);
    }
}
