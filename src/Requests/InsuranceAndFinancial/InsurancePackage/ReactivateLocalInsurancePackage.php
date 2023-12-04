<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\InsurancePackage;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * ReactivateLocalInsurancePackage
 *
 * Re-activate an existing deactivated record of locally administered insurance package
 */
class ReactivateLocalInsurancePackage extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/insurancepackages/configuration/locallyadministered/{$this->insurancepackageid}/reactivate";
    }

    /**
     * @param int $insurancepackageid insurancepackageid
     * @param null|string $expirationdate The expiration date of the locally administered insurance package.  By default, reactivating a package will blank out the expiration date of a package.  This parameter should be used if the expiration date needs to be restored to a specific date.
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
