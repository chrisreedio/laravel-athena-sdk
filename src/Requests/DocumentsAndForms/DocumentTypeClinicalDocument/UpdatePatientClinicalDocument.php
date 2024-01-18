<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeClinicalDocument;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientClinicalDocument
 *
 * Modifies a specific clinical document information Note: This endpoint may rely on specific settings
 * to be enabled in athenaNet Production to function properly that are not required in other
 * environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class UpdatePatientClinicalDocument extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/clinicaldocument/{$this->clinicaldocumentid}";
    }

    /**
     * @param  int  $clinicaldocumentid  clinicaldocumentid
     * @param  int  $patientid  patientid
     * @param  null|int  $clinicalproviderid  The ID of the external provider/lab/pharmacy associated the document.
     * @param  null|int  $documenttypeid  A specific document type identifier.
     * @param  null|string  $internalnote  An internal note for the provider or staff. Updating this will append to any previous notes if replaceinternalnote is not set.
     * @param  null|string  $observationdate  The date an observation was made (mm/dd/yyyy).
     * @param  null|string  $observationtime  The time an observation was made (hh24:mi).  24 hour time.
     * @param  null|string  $priority  Priority of this result.  1 is high; 2 is normal.
     * @param  null|int  $providerid  The ID of the ordering provider.
     * @param  null|bool  $replaceinternalnote  If true, will replace the existing internal note with the new one. If false, will append to the existing note.
     */
    public function __construct(
        protected int $clinicaldocumentid,
        protected int $patientid,
        protected ?int $clinicalproviderid = null,
        protected ?int $documenttypeid = null,
        protected ?string $internalnote = null,
        protected ?string $observationdate = null,
        protected ?string $observationtime = null,
        protected ?string $priority = null,
        protected ?int $providerid = null,
        protected ?bool $replaceinternalnote = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'clinicalproviderid' => $this->clinicalproviderid,
            'documenttypeid' => $this->documenttypeid,
            'internalnote' => $this->internalnote,
            'observationdate' => $this->observationdate,
            'observationtime' => $this->observationtime,
            'priority' => $this->priority,
            'providerid' => $this->providerid,
            'replaceinternalnote' => $this->replaceinternalnote,
        ]);
    }
}
