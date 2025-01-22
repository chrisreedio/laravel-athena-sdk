<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\CcmEnrollment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListCcmEnrollmentStatusChangeEvents
 *
 * Retrieve list of all events that can be input for this subscription.
 */
class ListCcmEnrollmentStatusChangeEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/ccmenrollmentstatus/changed/subscription/events';
    }

    public function __construct() {}
}
