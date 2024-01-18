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
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     * @param  null|string  $enddate  Include stays which were in "OPEN" or "DISCHARGED" status on or before this date.
     * @param  null|int  $patientid  Please remember to never disclose this ID to patients since it may result in inadvertent disclosure that a patient exists in a practice already.
     * @param  null|bool  $showclosed  By default it will be false. If set to true, stays with "CLOSED" status will also be returned.
     * @param  null|bool  $showdeleted  By default it will be false. If set to true, stays with "DELETED" status will also be returned
     * @param  null|bool  $showpending  By default it will be false. If set to true, stays with "PENDING" status will also be returned
     * @param  null|string  $startdate  Include stays which were in "OPEN" or "DISCHARGED" status on or after this date.
     */
    public function __construct(
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?string $enddate = null,
        protected ?int $patientid = null,
        protected ?bool $showclosed = null,
        protected ?bool $showdeleted = null,
        protected ?bool $showpending = null,
        protected ?string $startdate = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'enddate' => $this->enddate,
            'patientid' => $this->patientid,
            'showclosed' => $this->showclosed,
            'showdeleted' => $this->showdeleted,
            'showpending' => $this->showpending,
            'startdate' => $this->startdate,
        ]);
    }
}
