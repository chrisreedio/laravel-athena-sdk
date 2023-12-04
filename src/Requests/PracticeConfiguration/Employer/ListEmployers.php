<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\Employer;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListEmployers
 *
 * Retrieves a list of available patient employers
 */
class ListEmployers extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/employers';
    }

    /**
     * @param  null|string  $exactname The name of the employer (exact match).
     * @param  null|string  $city The city of the employer (exact match).
     * @param  null|string  $zip The zip of the employer (exact match).
     * @param  null|string  $name The name of the employer (partial match).
     * @param  null|string  $address The address of the employer (partial match).
     * @param  null|string  $phone The phone of the employer (exact match).
     * @param  null|string  $state The state of the employer (exact match).
     */
    public function __construct(
        protected ?string $exactname = null,
        protected ?string $city = null,
        protected ?string $zip = null,
        protected ?string $name = null,
        protected ?string $address = null,
        protected ?string $phone = null,
        protected ?string $state = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'exactname' => $this->exactname,
            'city' => $this->city,
            'zip' => $this->zip,
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'state' => $this->state,
        ]);
    }
}
