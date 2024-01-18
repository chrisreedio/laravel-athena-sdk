<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\PhysicalExam;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPhysicalExamFindings
 *
 * Retrieves a Physical Exam summary for a specific encounter
 */
class ListPhysicalExamFindings extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/physicalexam";
    }

    /**
     * @param  int  $encounterid  encounterid
     * @param  null|bool  $ccdaoutputformat  This parameter will place quotes around HTML tag qualifier values.
     * @param  null|bool  $showstructured  If true, returns the physical exam as structured data. If false, returns it via lightly-HTML marked up English text, as displayed in the athenanet encounter summary.
     * @param  null|array  $templateids  If templateids is passed in, it will return only the template data for the array of ids passed in. The showstructured flag must be true to use this. Please note: this will cause the results to return the physical exam template, and not the data selected for the current encounter.
     */
    public function __construct(
        protected int $encounterid,
        protected ?bool $ccdaoutputformat = null,
        protected ?bool $showstructured = null,
        protected ?array $templateids = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'ccdaoutputformat' => $this->ccdaoutputformat,
            'showstructured' => $this->showstructured,
            'templateids' => $this->templateids,
        ]);
    }
}
