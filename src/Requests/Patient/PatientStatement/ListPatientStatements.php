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
     * @param  string  $enddate Statements sent on or before this date (mm/dd/yyyy) will be included in the results.
     * @param  int  $patientid patientid
     * @param  string  $startdate Statements sent on or after this date (mm/dd/yyyy) will be included in the results.
     * @param  null|bool  $claimsinstatement To view claim details sent in statement.
     * @param  null|bool  $findpdfexist To check if the statement PDF is available.
     */
    public function __construct(
        protected string $enddate,
        protected int $patientid,
        protected string $startdate,
        protected ?bool $claimsinstatement = null,
        protected ?bool $findpdfexist = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'enddate' => $this->enddate,
            'startdate' => $this->startdate,
            'claimsinstatement' => $this->claimsinstatement,
            'findpdfexist' => $this->findpdfexist,
        ]);
    }
}
