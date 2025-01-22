<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeImagingResult;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientImagingResultDocument
 *
 * Modifies a specific imaging results document information Note: This endpoint may rely on specific
 * settings to be enabled in athenaNet Production to function properly that are not required in other
 * environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class UpdatePatientImagingResultDocument extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/imagingresult/{$this->imagingresultid}";
    }

    /**
     * @param  int  $imagingresultid  imagingresultid
     * @param  int  $patientid  patientid
     * @param  null|string  $accessionid  A unique identifier given to a document to track it over time.
     * @param  null|int  $documenttypeid  A specific document type identifier.
     * @param  null|int  $facilityid  The ID of the facility or clinical provider who received the order.
     * @param  null|string  $internalnote  An internal note for the provider or staff. Updating this will append to any previous notes if replaceinternalnote is not set.
     * @param  null|string  $interpretation  The practice entered interpretation of this result. Updating this will append to any previous values.
     * @param  null|string  $observationdate  The date an observation was made (mm/dd/yyyy).
     * @param  null|string  $observationtime  The time an observation was made (hh24:mi).  24 hour time.
     * @param  null|string  $patientnote  This is a note specifically for the patient to view or action on. Updating this will append to any previous notes.
     * @param  null|string  $priority  Priority of this result.  1 is high; 2 is normal.
     * @param  null|int  $providerid  The ID of the ordering provider.
     * @param  null|bool  $replaceinternalnote  If true, will replace the existing internal note with the new one. If false, will append to the existing note.
     * @param  null|bool  $replacepatientnote  If true, will replace the existing patient note with the new one. If false, will append to the existing note.
     * @param  null|string  $reportstatus  The status of the report.
     * @param  null|string  $resultstatus  The status of the result.
     * @param  null|string  $ssotarget  URL that you want to use as your target when doing SSO with an external link. Note that this requires special setup before this will work.
     * @param  null|int  $tietoorderid  Tie the result document to this order.
     */
    public function __construct(
        protected int $imagingresultid,
        protected int $patientid,
        protected ?string $accessionid = null,
        protected ?int $documenttypeid = null,
        protected ?int $facilityid = null,
        protected ?string $internalnote = null,
        protected ?string $interpretation = null,
        protected ?string $observationdate = null,
        protected ?string $observationtime = null,
        protected ?string $patientnote = null,
        protected ?string $priority = null,
        protected ?int $providerid = null,
        protected ?bool $replaceinternalnote = null,
        protected ?bool $replacepatientnote = null,
        protected ?string $reportstatus = null,
        protected ?string $resultstatus = null,
        protected ?string $ssotarget = null,
        protected ?int $tietoorderid = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'accessionid' => $this->accessionid,
            'documenttypeid' => $this->documenttypeid,
            'facilityid' => $this->facilityid,
            'internalnote' => $this->internalnote,
            'interpretation' => $this->interpretation,
            'observationdate' => $this->observationdate,
            'observationtime' => $this->observationtime,
            'patientnote' => $this->patientnote,
            'priority' => $this->priority,
            'providerid' => $this->providerid,
            'replaceinternalnote' => $this->replaceinternalnote,
            'replacepatientnote' => $this->replacepatientnote,
            'reportstatus' => $this->reportstatus,
            'resultstatus' => $this->resultstatus,
            'ssotarget' => $this->ssotarget,
            'tietoorderid' => $this->tietoorderid,
        ]);
    }
}
