<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\ChartAlert;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientChartAlert
 *
 * Modifies the chart alert record for a patient in a specific department
 */
class UpdatePatientChartAlert extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/chartalert";
    }

    /**
     * @param  int  $patientid patientid
     * @param  string  $notetext The note text.  Use PUT to add to any existing text and POST if you want to add new or replace the full note
     * @param  int  $departmentid The department ID; needed because charts, and thus chart notes, may be department-specific
     */
    public function __construct(
        protected int $patientid,
        protected string $notetext,
        protected int $departmentid,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'notetext' => $this->notetext,
        ]);
    }
}
