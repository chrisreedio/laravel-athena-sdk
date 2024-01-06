<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ReferringProvider;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateReferringProvider
 *
 * Modifies the information for a specific referring provider
 */
class UpdateReferringProvider extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/referringproviders/{$this->referringproviderid}";
    }

    /**
     * @param  int  $referringproviderid referringproviderid
     * @param  null|string  $address The address of the referring provider.
     * @param  null|string  $address2 The address (line 2)  of the referring provider.
     * @param  null|string  $city The city of the referring provider.
     * @param  null|string  $email The email of the referring provider.
     * @param  null|string  $fax The fax of the referring provider.
     * @param  null|string  $firstname The first name of the referring provider.
     * @param  null|string  $lastname The last name of the referring provider.
     * @param  null|string  $middleinitial The middle initial of the referring provider.
     * @param  null|string  $namesuffix The name suffix of the referring provider.
     * @param  null|string  $note The notes associated with the referring provider.
     * @param  null|int  $npinumber The NPI number associated with the referring provider. If this parameter exists in the body without a value, it will null out this field.
     * @param  null|string  $phone The phone of the referring provider.
     * @param  null|string  $state The state of the referring provider.
     * @param  null|string  $zip The zip of the referring provider.
     */
    public function __construct(
        protected int $referringproviderid,
        protected ?string $address = null,
        protected ?string $address2 = null,
        protected ?string $city = null,
        protected ?string $email = null,
        protected ?string $fax = null,
        protected ?string $firstname = null,
        protected ?string $lastname = null,
        protected ?string $middleinitial = null,
        protected ?string $namesuffix = null,
        protected ?string $note = null,
        protected ?int $npinumber = null,
        protected ?string $phone = null,
        protected ?string $state = null,
        protected ?string $zip = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'address' => $this->address,
            'address2' => $this->address2,
            'city' => $this->city,
            'email' => $this->email,
            'fax' => $this->fax,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'middleinitial' => $this->middleinitial,
            'namesuffix' => $this->namesuffix,
            'note' => $this->note,
            'npinumber' => $this->npinumber,
            'phone' => $this->phone,
            'state' => $this->state,
            'zip' => $this->zip,
        ]);
    }
}
