<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeEncounterDocument;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientEncounterDocument
 *
 * Modifies a specific encounter document information Note: This endpoint may rely on specific settings
 * to be enabled in athenaNet Production to function properly that are not required in other
 * environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class UpdatePatientEncounterDocument extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/encounterdocument/{$this->encounterdocumentid}";
    }

    /**
     * @param int $departmentid The athenaNet department ID associated with the uploaded document.
     * @param int $encounterdocumentid encounterdocumentid
     * @param int $patientid patientid
     * @param null|int $appointmentid The appointment ID for this document
     * @param null|int $encounterid The encounter ID
     * @param null|string $internalnote An internal note for the provider or staff. Updating this will append to any previous notes.
     * @param null|string $priority Priority of this result.  1 is high; 2 is normal.
     */
    public function __construct(
        protected int     $departmentid,
        protected int     $encounterdocumentid,
        protected int     $patientid,
        protected ?int    $appointmentid = null,
        protected ?int    $encounterid = null,
        protected ?string $internalnote = null,
        protected ?string $priority = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'appointmentid' => $this->appointmentid,
            'encounterid' => $this->encounterid,
            'internalnote' => $this->internalnote,
            'priority' => $this->priority,
        ]);
    }
}
