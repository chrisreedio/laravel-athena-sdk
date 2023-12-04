<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ProcedureCodes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetProcedureDocumentation
 *
 * Retrieves the procedure documentation associated with a specific encounter.
 */
class GetProcedureDocumentation extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/proceduredocumentation";
    }

    /**
     * @param int $encounterid encounterid
     * @param null|bool $showhtml Procedure documentation is stored as HTML templates filled in by the practice.  By default, we strip out all HTML when returning the data back through the API.  However, there are times when preserving the HTML formatting may be useful. If SHOWHTML is set to true, the original HTML from the template is preserved when returning data back through the API.
     * @param null|bool $showoutcomes Some practices utilize encounters with procedure workflows to document additional information about the procedure, such as outcomes associated with the proceduredocumentation. If SHOWOUTCOMES is set to true, returns additional information about outcomes, if it exists.
     */
    public function __construct(
        protected int $encounterid,
        protected ?bool $showhtml = null,
        protected ?bool $showoutcomes = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'showhtml' => $this->showhtml,
            'showoutcomes' => $this->showoutcomes
        ]);
    }
}
