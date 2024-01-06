<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\Patient;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientsByCustomFields
 *
 * Retrieves matching patients based on custom field value. The customfieldvalue is either an actual
 * value for non-select fields or an optionid when the value was from select field.
 */
class ListPatientsByCustomFields extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/customfields/{$this->customfieldid}/{$this->customfieldvalue}";
    }

    /**
     * @param  int  $customfieldid customfieldid
     * @param  string  $customfieldvalue customfieldvalue
     */
    public function __construct(
        protected int $customfieldid,
        protected string $customfieldvalue,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
