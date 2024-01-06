<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\CustomFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListCustomFields
 *
 * Retrieves a list of custom fields for the practice
 */
class ListCustomFields extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/customfields';
    }

    public function __construct()
    {
    }
}
