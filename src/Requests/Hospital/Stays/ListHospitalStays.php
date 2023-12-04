<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\Stays;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListHospitalStays
 *
 * BETA: Retrieves a list of patient stays in all statuses and may be filtered by date. If no date
 * range is provided then all stays with an "OPEN" or "DISCHARGED" status at the time of the call will
 * be returned.
 */
class ListHospitalStays extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/stays/all';
    }

    /**
     * @param  null|bool  $showdeleted By default it will be false. If set to true, stays with "DELETED" status will also be returned
     * @param  null|bool  $showpending By default it will be false. If set to true, stays with "PENDING" status will also be returned
     * @param  null|string  $enddate Include stays which were in "OPEN" or "DISCHARGED" status on or before this date.
     * @param  null|string  $startdate Include stays which were in "OPEN" or "DISCHARGED" status on or after this date.
     * @param  null|bool  $showclosed By default it will be false. If set to true, stays with "CLOSED" status will also be returned.
     * @param  null|int  $patientid Please remember to never disclose this ID to patients since it may result in inadvertent disclosure that a patient exists in a practice already.
     * @param  null|string  $thirdpartyusername User name of the patient in the third party application.
     * @param  null|bool  $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     */
    public function __construct(
        protected ?bool $showdeleted = null,
        protected ?bool $showpending = null,
        protected ?string $enddate = null,
        protected ?string $startdate = null,
        protected ?bool $showclosed = null,
        protected ?int $patientid = null,
        protected ?string $thirdpartyusername = null,
        protected ?bool $patientfacingcall = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'showdeleted' => $this->showdeleted,
            'showpending' => $this->showpending,
            'enddate' => $this->enddate,
            'startdate' => $this->startdate,
            'showclosed' => $this->showclosed,
            'patientid' => $this->patientid,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
        ]);
    }
}
