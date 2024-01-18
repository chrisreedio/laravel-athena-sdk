<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\Employer;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateEmployee
 *
 * Creates a record for an employer
 */
class CreateEmployee extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/employers';
    }

    /**
     * @param  null|string  $address  The address of the employer.
     * @param  null|string  $city  The city of the employer.
     * @param  null|int  $countryid  The country ID of the employer.
     * @param  null|string  $fax  The fax number of the employer.
     * @param  null|string  $name  The name of the employer.
     * @param  null|string  $phone  The phone number of the employer.
     * @param  null|string  $state  The state of the employer.
     * @param  null|string  $zip  The zip code of the employer.
     */
    public function __construct(
        protected ?string $address = null,
        protected ?string $city = null,
        protected ?int $countryid = null,
        protected ?string $fax = null,
        protected ?string $name = null,
        protected ?string $phone = null,
        protected ?string $state = null,
        protected ?string $zip = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'address' => $this->address,
            'city' => $this->city,
            'countryid' => $this->countryid,
            'fax' => $this->fax,
            'name' => $this->name,
            'phone' => $this->phone,
            'state' => $this->state,
            'zip' => $this->zip,
        ]);
    }
}
