<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\FaxConfirmation;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateFaxConfirmation
 *
 * Create a record of fax conformations submitted by vendors
 */
class CreateFaxConfirmation extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/faxconfirmations';
    }

    /**
     * @param  array  $confirmations  the list of fax confirmations
     * @param  string  $vendorname  vendor name pushing fax confirmations
     */
    public function __construct(
        protected array $confirmations,
        protected string $vendorname,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'confirmations' => $this->confirmations,
            'vendorname' => $this->vendorname,
        ]);
    }
}
