<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\PatientPortalSettings;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientPortalSettings
 *
 * Retrieves patient portal settings
 */
class GetPatientPortalSettings extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/misc/portalsettings';
    }

    /**
     * @param null|int $communicatorbrandid The ID of the brand. If provided this will override the value of PORTALDISPLAYNAME in the output structure. If you want the name used in the name used in the portal for non branded portals pass this as undef
     */
    public function __construct(
        protected ?int $communicatorbrandid = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter(['communicatorbrandid' => $this->communicatorbrandid]);
    }
}
