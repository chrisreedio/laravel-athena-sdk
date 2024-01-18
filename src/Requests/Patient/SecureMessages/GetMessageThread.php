<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\SecureMessages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetMessageThread
 *
 * Retrieves messages associated to a specific message-thread for a specific patient
 */
class GetMessageThread extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/securemessage/{$this->messagethreadid}";
    }

    /**
     * @param  int  $messagethreadid  messagethreadid
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected int $messagethreadid,
        protected int $patientid,
    ) {
    }
}
