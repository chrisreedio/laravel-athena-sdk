<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePrescription;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPrescriptionSubscriptions
 *
 * Retrieves list of events applicable for prescription Note: This endpoint may rely on specific
 * settings to be enabled in athenaNet Production to function properly that are not required in other
 * environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class ListPrescriptionSubscriptions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/prescriptions/changed/subscription';
    }

    public function __construct() {}
}
