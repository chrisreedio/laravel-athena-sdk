<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\InsurancePackage;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * DeactivateLocalInsurancePackage
 *
 * Deactivate an existing record of locally administered insurance package so that it cannot be further
 * used.
 */
class DeactivateLocalInsurancePackage extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/insurancepackages/configuration/locallyadministered/{$this->insurancepackageid}/deactivate";
    }

    /**
     * @param int $insurancepackageid insurancepackageid
     * @param null|string $expirationdate The expiration date of the locally administered insurance package.
     */
    public function __construct(
        protected int     $insurancepackageid,
        protected ?string $expirationdate = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter(['expirationdate' => $this->expirationdate]);
    }
}
