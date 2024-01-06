<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\EnrollmentDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListProviderEnrollmentDocs
 *
 * Retrieves the enrollment documents for a single provider
 */
class ListProviderEnrollmentDocs extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/providers/{$this->providerprofileid}/enrollmentdocs";
    }

    /**
     * @param  int  $providerprofileid providerprofileid
     * @param  null|bool  $open A boolean flag indicating that the response should include only document's whose OPEN field is true or false (depending on the flag value). If this flag is not set, all documents will be included in the response.
     */
    public function __construct(
        protected int $providerprofileid,
        protected ?bool $open = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['open' => $this->open]);
    }
}
