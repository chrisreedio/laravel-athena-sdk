<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeLabResult;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientLabResultDocument
 *
 * Modifies a specific lab result document information Note: This endpoint may rely on specific
 * settings to be enabled in athenaNet Production to function properly that are not required in other
 * environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class UpdatePatientLabResultDocument extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/labresult/{$this->labresultid}";
    }

    /**
     * @param  int  $labresultid  labresultid
     * @param  int  $patientid  patientid
     * @param  null|string  $accessionid  A unique identifier given to a document to track it over time.
     * @param  null|array  $analytes  This is an array of hashes in JSON. Each entry contains information for a single analyte. See <a href="https://developer.athenahealth.com/docs/read/workflows/documents/Lab_Analytes">https://developer.athenahealth.com/docs/read/workflows/documents/Lab_Analytes</a> for an example.
     * @param  null|int  $documenttypeid  A specific document type identifier.
     * @param  null|int  $facilityid  The ID of the facility or clinical provider who received the order.
     * @param  null|string  $internalnote  An internal note for the provider or staff. Updating this will append to any previous notes if replaceinternalnote is not set.
     * @param  null|string  $interpretation  The practice entered interpretation of this result. Updating this will append to any previous values.
     * @param  null|string  $notetopatient  This is a note specifically for the patient to view or action on. Updating this will append to any previous notes.
     * @param  null|string  $observationdate  The date an observation was made (mm/dd/yyyy).
     * @param  null|string  $observationtime  The time an observation was made (hh24:mi).  24 hour time.
     * @param  null|string  $priority  Priority of this result.  1 is high; 2 is normal.
     * @param  null|int  $providerid  The ID of the ordering provider.
     * @param  null|bool  $replaceinternalnote  If true, will replace the existing internal note with the new one. If false, will append to the existing note.
     * @param  null|bool  $replacepatientnote  If true, will replace the existing patient note with the new one. If false, will append to the existing note.
     * @param  null|string  $reportstatus  The status of the report.
     * @param  null|string  $resultnotes  Result notes of a document.
     * @param  null|string  $resultstatus  The status of the result.
     * @param  null|string  $specimenreceiveddatetime  Date-time indicating when the specimen was received in format (yyyy-mm-ddThh:mm:ss).
     * @param  null|string  $specimenreporteddatetime  Date-time indicating when the specimen was reported in format (yyyy-mm-ddThh:mm:ss).
     * @param  null|int  $tietoorderid  Tie the result document to this order.
     */
    public function __construct(
        protected int $labresultid,
        protected int $patientid,
        protected ?string $accessionid = null,
        protected ?array $analytes = null,
        protected ?int $documenttypeid = null,
        protected ?int $facilityid = null,
        protected ?string $internalnote = null,
        protected ?string $interpretation = null,
        protected ?string $notetopatient = null,
        protected ?string $observationdate = null,
        protected ?string $observationtime = null,
        protected ?string $priority = null,
        protected ?int $providerid = null,
        protected ?bool $replaceinternalnote = null,
        protected ?bool $replacepatientnote = null,
        protected ?string $reportstatus = null,
        protected ?string $resultnotes = null,
        protected ?string $resultstatus = null,
        protected ?string $specimenreceiveddatetime = null,
        protected ?string $specimenreporteddatetime = null,
        protected ?int $tietoorderid = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'accessionid' => $this->accessionid,
            'analytes' => $this->analytes,
            'documenttypeid' => $this->documenttypeid,
            'facilityid' => $this->facilityid,
            'internalnote' => $this->internalnote,
            'interpretation' => $this->interpretation,
            'notetopatient' => $this->notetopatient,
            'observationdate' => $this->observationdate,
            'observationtime' => $this->observationtime,
            'priority' => $this->priority,
            'providerid' => $this->providerid,
            'replaceinternalnote' => $this->replaceinternalnote,
            'replacepatientnote' => $this->replacepatientnote,
            'reportstatus' => $this->reportstatus,
            'resultnotes' => $this->resultnotes,
            'resultstatus' => $this->resultstatus,
            'specimenreceiveddatetime' => $this->specimenreceiveddatetime,
            'specimenreporteddatetime' => $this->specimenreporteddatetime,
            'tietoorderid' => $this->tietoorderid,
        ]);
    }
}
