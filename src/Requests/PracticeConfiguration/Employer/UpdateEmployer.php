<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\Employer;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateEmployer
 *
 * Modifies information of a specific employer
 */
class UpdateEmployer extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/employers/{$this->employerid}";
    }

    /**
     * @param  int  $employerid employerid
     * @param  null|string  $fax The fax number of the employer.
     * @param  null|string  $zip The zip code of the employer.
     * @param  null|string  $city The city of the employer.
     * @param  null|string  $name The name of the employer.
     * @param  null|string  $phone The phone number of the employer.
     * @param  null|string  $state The state of the employer.
     * @param  null|string  $address The address of the employer.
     * @param  null|int  $countryid The country ID of the employer.
     */
    public function __construct(
        protected int $employerid,
        protected ?string $fax = null,
        protected ?string $zip = null,
        protected ?string $city = null,
        protected ?string $name = null,
        protected ?string $phone = null,
        protected ?string $state = null,
        protected ?string $address = null,
        protected ?int $countryid = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'fax' => $this->fax,
            'zip' => $this->zip,
            'city' => $this->city,
            'name' => $this->name,
            'phone' => $this->phone,
            'state' => $this->state,
            'address' => $this->address,
            'countryid' => $this->countryid,
        ]);
    }
}
