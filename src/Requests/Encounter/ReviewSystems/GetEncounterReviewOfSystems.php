<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ReviewSystems;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetEncounterReviewOfSystems
 *
 * Retrieves a Physical Exam summary for a specific encounter
 */
class GetEncounterReviewOfSystems extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/reviewofsystems";
    }

    /**
     * @param  int  $encounterid  encounterid
     * @param  null|bool  $showstructured  If true, returns the review of systems as structured data. If false, returns it via lightly-HTML marked up English text, as displayed in the athenanet encounter summary.
     * @param  null|array  $templateids  If templateids are passed in, this will return only the template data for the ids passed in, and not the data selected for the current encounter. The showstructured flag must be true to use this. This can be used in conjunction with wellchildtemplateids.
     * @param  null|array  $wellchildtemplateids  If wellchildtemplateids are passed in, this will return only the template data for the ids passed in, and not the data selected for the current encounter. The showstructured flag must be true to use this. This can be used in conjunction with templateids.
     */
    public function __construct(
        protected int $encounterid,
        protected ?bool $showstructured = null,
        protected ?array $templateids = null,
        protected ?array $wellchildtemplateids = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'showstructured' => $this->showstructured,
            'templateids' => $this->templateids,
            'wellchildtemplateids' => $this->wellchildtemplateids,
        ]);
    }
}
