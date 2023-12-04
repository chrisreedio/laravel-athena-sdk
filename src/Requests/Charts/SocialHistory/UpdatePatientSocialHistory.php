<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\SocialHistory;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientSocialHistory
 *
 * Modifies the social history information of a specific patient
 */
class UpdatePatientSocialHistory extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/socialhistory";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $departmentid The department for this patient. A patient may have multiple charts, and the department determines which chart to retrieve.
     * @param  null|array  $questions The list of question/answer pairs to be submitted. A JSON array of questions mimicking <a href="https://developer.athenahealth.com/docs/read/chart/Social_History">the inputs</a> described in the PUT call. Only the questions submitted will be added/updated/deleted.
     * @param  null|string  $sectionnote A section-wide note
     */
    public function __construct(
        protected int $patientid,
        protected int $departmentid,
        protected ?array $questions = null,
        protected ?string $sectionnote = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['departmentid' => $this->departmentid, 'questions' => $this->questions, 'sectionnote' => $this->sectionnote]);
    }
}
