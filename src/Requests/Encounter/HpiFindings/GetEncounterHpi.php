<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\HpiFindings;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetEncounterHpi
 *
 * Retrieves the HPI summary for an encounter
 */
class GetEncounterHpi extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/hpi";
    }

    /**
     * @param int $encounterid encounterid
     * @param null|bool $showstructured If true, returns history of present illness templates as structured data. If false, returns it via lightly-HTML marked up English text, as displayed in the athenanet encounter summary.
     * @param null|array $templateids If templateids is passed in, it will return only the template data for the array of ids passed in. The SHOWSTRUCTURED flag must be true to use this.
     */
    public function __construct(
        protected int    $encounterid,
        protected ?bool  $showstructured = null,
        protected ?array $templateids = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'showstructured' => $this->showstructured,
            'templateids' => $this->templateids
        ]);
    }
}
