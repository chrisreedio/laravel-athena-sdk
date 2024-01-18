<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\ChartExport;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientChartExportDocument
 *
 * Create patient chart export document record
 */
class CreatePatientChartExportDocument extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/documentexport";
    }

    /**
     * @param  string  $createfromdaterangestart  The start date, inclusive, of the chart export.
     * @param  int  $patientid  patientid
     * @param  null|array  $createfromdatedocumentclass  One or more document classes to include in the export.  Defaults to LABRESULT, IMAGINGRESULT, and CLINICALDOCUMENT.
     * @param  null|string  $createfromdaterangeend  The end date, inclusive, of the chart export.  Defaults to today.
     * @param  null|int  $departmentid  The department ID associated with the document export.
     */
    public function __construct(
        protected string $createfromdaterangestart,
        protected int $patientid,
        protected ?array $createfromdatedocumentclass = null,
        protected ?string $createfromdaterangeend = null,
        protected ?int $departmentid = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'createfromdaterangestart' => $this->createfromdaterangestart,
            'createfromdatedocumentclass' => $this->createfromdatedocumentclass,
            'createfromdaterangeend' => $this->createfromdaterangeend,
            'departmentid' => $this->departmentid,
        ]);
    }
}
