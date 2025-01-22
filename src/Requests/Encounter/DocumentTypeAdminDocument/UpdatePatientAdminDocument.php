<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeAdminDocument;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientAdminDocument
 *
 * Modifies the data of a specific admin document of a patient Note: This endpoint may rely on specific
 * settings to be enabled in athenaNet Production to function properly that are not required in other
 * environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class UpdatePatientAdminDocument extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/admin/{$this->adminid}";
    }

    /**
     * @param  int  $adminid  adminid
     * @param  int  $patientid  patientid
     * @param  null|int  $adminid  The document ID of the edited document.
     * @param  null|string  $documentdate  The date an observation was made (mm/dd/yyyy).
     * @param  null|int  $documenttypeid  A specific document type identifier.
     * @param  null|string  $internalnote  An internal note for the provider or staff. Updating this will append to any previous notes.
     * @param  null|string  $priority  Priority of this result.  1 is high; 2 is normal.
     * @param  null|int  $providerid  The ID of the ordering provider.
     */
    public function __construct(
        protected ?int $adminid,
        protected int $patientid,
        protected ?string $documentdate = null,
        protected ?int $documenttypeid = null,
        protected ?string $internalnote = null,
        protected ?string $priority = null,
        protected ?int $providerid = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'adminid' => $this->adminid,
            'documentdate' => $this->documentdate,
            'documenttypeid' => $this->documenttypeid,
            'internalnote' => $this->internalnote,
            'priority' => $this->priority,
            'providerid' => $this->providerid,
        ]);
    }
}
