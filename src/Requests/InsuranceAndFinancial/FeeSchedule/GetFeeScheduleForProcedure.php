<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\FeeSchedule;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetFeeScheduleForProcedure
 *
 * Retrieves fees for a specific procedure code
 */
class GetFeeScheduleForProcedure extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/feeschedules/checkprocedure';
    }

    /**
     * @param  int  $departmentid The department ID you are operating in.
     * @param  int  $insurancepackageid The insurance package ID for which you want to find a fee.
     * @param  array  $procedurecode The procedure code (including any modifiers) for which you want to find a fee (e.g "99213" or "J12345,TC"). Multiple codes (either as a tab delimited list or multiple POSTed values) are allowed.
     * @param  null|string  $servicedate The date of service for which you want to check if a fee exists.  If not passed, defaults to today.
     */
    public function __construct(
        protected int $departmentid,
        protected int $insurancepackageid,
        protected array $procedurecode,
        protected ?string $servicedate = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'insurancepackageid' => $this->insurancepackageid,
            'procedurecode' => $this->procedurecode,
            'servicedate' => $this->servicedate,
        ]);
    }
}
