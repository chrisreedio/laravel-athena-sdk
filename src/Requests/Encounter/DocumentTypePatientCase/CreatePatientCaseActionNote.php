<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePatientCase;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientCaseActionNote
 *
 * Returns a success message pertaining to the update.
 */
class CreatePatientCaseActionNote extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/patientcase/{$this->patientcaseid}/actions";
    }

    /**
     * @param  string  $actionnote  The new action note to add to the document.
     * @param  int  $patientcaseid  patientcaseid
     */
    public function __construct(
        protected string $actionnote,
        protected int $patientcaseid,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['actionnote' => $this->actionnote]);
    }
}
