<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ClinicalProvider;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetClinicalProvider
 *
 * Retrieves details of a specific clinical provider
 */
class GetClinicalProvider extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/clinicalproviders/{$this->clinicalproviderid}";
    }

    /**
     * @param  int  $clinicalproviderid clinicalproviderid
     * @param  null|bool  $showdeleted By default, a deleted clinical provider is not returned.  Set to return if deleted.
     * @param  null|int  $shownpi Include NPI in output.
     * @param  null|int  $showfederalidnumber Include federal ID number in output.
     */
    public function __construct(
        protected int $clinicalproviderid,
        protected ?bool $showdeleted = null,
        protected ?int $shownpi = null,
        protected ?int $showfederalidnumber = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['showdeleted' => $this->showdeleted, 'shownpi' => $this->shownpi, 'showfederalidnumber' => $this->showfederalidnumber]);
    }
}
