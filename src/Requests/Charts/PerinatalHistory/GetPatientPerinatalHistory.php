<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\PerinatalHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientPerinatalHistory
 *
 * BETA: Retrieves prenatal history and birth history information
 */
class GetPatientPerinatalHistory extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/perinatalhistory";
    }

    /**
     * @param  int  $departmentid  The athenaNet department ID.
     * @param  int  $patientid  patientid
     * @param  null|bool  $showunansweredquestions  Include questions where there is no current answer.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?bool $showunansweredquestions = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'showunansweredquestions' => $this->showunansweredquestions,
        ]);
    }
}
