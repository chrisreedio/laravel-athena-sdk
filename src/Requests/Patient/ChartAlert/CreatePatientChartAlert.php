<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\ChartAlert;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientChartAlert
 *
 * Create a chart alert record for a patient in a specific department
 */
class CreatePatientChartAlert extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/chartalert";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $departmentid The department ID; needed because charts, and thus chart notes, may be department-specific
     * @param  string  $notetext The note text.  Use PUT to add to any existing text and POST if you want to add new or replace the full note
     */
    public function __construct(
        protected int $patientid,
        protected int $departmentid,
        protected string $notetext,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['departmentid' => $this->departmentid, 'notetext' => $this->notetext]);
    }
}
