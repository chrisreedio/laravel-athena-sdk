<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\Forms;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientClientForms
 *
 * Retrieves a list of client forms
 */
class ListPatientClientForms extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/patients/clientforms';
    }

    /**
     * @param  int  $departmentid The department id
     * @param  null|bool  $hidepdfs Hides PDF forms if set
     */
    public function __construct(
        protected int $departmentid,
        protected ?bool $hidepdfs = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'hidepdfs' => $this->hidepdfs,
        ]);
    }
}
