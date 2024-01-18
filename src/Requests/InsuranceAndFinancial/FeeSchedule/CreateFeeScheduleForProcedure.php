<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\FeeSchedule;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateFeeScheduleForProcedure
 *
 * Create a new procedure code record with procedure fees information
 */
class CreateFeeScheduleForProcedure extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/feeschedules/configuration/procedure';
    }

    /**
     * @param  number  $amount  The amount to charge for this procedure code.
     * @param  int  $feescheduleid  The ID of the fee schedule.
     * @param  string  $procedurecode  The procedure code to be added or updated.
     */
    public function __construct(
        protected \number $amount,
        protected int $feescheduleid,
        protected string $procedurecode,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'amount' => $this->amount,
            'feescheduleid' => $this->feescheduleid,
            'procedurecode' => $this->procedurecode,
        ]);
    }
}
