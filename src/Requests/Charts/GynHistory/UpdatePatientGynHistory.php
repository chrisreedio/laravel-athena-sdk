<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\GynHistory;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientGynHistory
 *
 * Modifies the list of questions and their responses captured in the GYN History
 */
class UpdatePatientGynHistory extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/gynhistory";
    }

    /**
     * @param  int  $departmentid The athenaNet department id.
     * @param  int  $patientid patientid
     * @param  null|array  $questions A JSON array of questions mimicking <a href="https://developer.athenahealth.com/docs/read/chart/OBGYN_History">the input</a> described in the PUT call.
     * @param  null|string  $sectionnote Any additional section notes
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?array $questions = null,
        protected ?string $sectionnote = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'questions' => $this->questions,
            'sectionnote' => $this->sectionnote,
        ]);
    }
}
