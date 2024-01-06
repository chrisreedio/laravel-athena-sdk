<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\FeeSchedule;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteFeeScheduleForProcedure
 *
 * Remove the existing fee schedule record for a procedure from the system
 */
class DeleteFeeScheduleForProcedure extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/feeschedules/configuration/procedure';
    }

    /**
     * @param  int  $feescheduleid The ID of the fee schedule.
     * @param  string  $procedurecode The procedure code to be removed.
     */
    public function __construct(
        protected int $feescheduleid,
        protected string $procedurecode,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'feescheduleid' => $this->feescheduleid,
            'procedurecode' => $this->procedurecode,
        ]);
    }
}
