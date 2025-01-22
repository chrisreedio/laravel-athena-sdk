<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePatientCase;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientCaseChangeEvents
 *
 * Retrieve list of all events that can be input for this subscription.
 */
class ListPatientCaseChangeEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/documents/patientcase/changed/subscription/events';
    }

    public function __construct() {}
}
