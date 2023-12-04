<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientStatement;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientStatements
 *
 * Retrieves a list of patient statements for a specific patient chart
 */
class ListPatientStatements extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/patientstatement";
    }

    /**
     * @param  int  $patientid patientid
     * @param  null|bool  $findpdfexist To check if the statement PDF is available.
     * @param  string  $enddate Statements sent on or before this date (mm/dd/yyyy) will be included in the results.
     * @param  null|bool  $claimsinstatement To view claim details sent in statement.
     * @param  string  $startdate Statements sent on or after this date (mm/dd/yyyy) will be included in the results.
     */
    public function __construct(
        protected int $patientid,
        protected ?bool $findpdfexist,
        protected string $enddate,
        protected ?bool $claimsinstatement,
        protected string $startdate,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'findpdfexist' => $this->findpdfexist,
            'enddate' => $this->enddate,
            'claimsinstatement' => $this->claimsinstatement,
            'startdate' => $this->startdate,
        ]);
    }
}
