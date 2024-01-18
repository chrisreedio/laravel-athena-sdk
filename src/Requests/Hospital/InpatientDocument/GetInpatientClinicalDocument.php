<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\InpatientDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetInpatientClinicalDocument
 *
 * BETA: Retrieves a specific clinical document information
 */
class GetInpatientClinicalDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/inpatient/document/clinical/{$this->clinicaldocumentid}";
    }

    /**
     * @param  int  $clinicaldocumentid  clinicaldocumentid
     * @param  null|string  $pageids  Returns only the corresponding pages from the document (Ignores invalid pageids).
     */
    public function __construct(
        protected int $clinicaldocumentid,
        protected ?string $pageids = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['pageids' => $this->pageids]);
    }
}
