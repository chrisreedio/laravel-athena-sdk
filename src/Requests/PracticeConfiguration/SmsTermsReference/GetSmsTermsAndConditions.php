<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\SmsTermsReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetSmsTermsAndConditions
 *
 * Retrieves SMS consent text
 */
class GetSmsTermsAndConditions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/misc/smstermsandconditions';
    }

    public function __construct() {}
}
