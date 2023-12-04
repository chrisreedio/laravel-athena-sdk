<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\FamilyHistory;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientFamilyHistory
 *
 * Modifies the family history for a specific patient
 */
class UpdatePatientFamilyHistory extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/familyhistory";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $departmentid The athenaNet department id.
     * @param  null|array  $relatives A JSON array of relatives, mimicking <a href="https://developer.athenahealth.com/docs/read/chart/Family_History">the output format</a> of the GET call.
     * @param  null|string  $sectionnote Any additional section notes
     */
    public function __construct(
        protected int $patientid,
        protected int $departmentid,
        protected ?array $relatives = null,
        protected ?string $sectionnote = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['departmentid' => $this->departmentid, 'relatives' => $this->relatives, 'sectionnote' => $this->sectionnote]);
    }
}
