<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Problems;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientProblemDetails
 *
 * Modify the information of a specific patient's problem
 */
class UpdatePatientProblemDetails extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/problems/{$this->problemid}";
    }

    /**
     * @param  int  $departmentid The athenaNet department id.
     * @param  int  $patientid patientid
     * @param  int  $problemid problemid
     * @param  null|string  $laterality Update the laterality of this problem. Can be null, LEFT, RIGHT, or BILATERAL.
     * @param  null|string  $note The note to be attached to this problem.
     * @param  null|string  $startdate The onset date to be updated for this problem in MM/DD/YYYY format.
     * @param  null|string  $status Whether the problem is chronic or acute.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected int $problemid,
        protected ?string $laterality = null,
        protected ?string $note = null,
        protected ?string $startdate = null,
        protected ?string $status = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'laterality' => $this->laterality,
            'note' => $this->note,
            'startdate' => $this->startdate,
            'status' => $this->status,
        ]);
    }
}
