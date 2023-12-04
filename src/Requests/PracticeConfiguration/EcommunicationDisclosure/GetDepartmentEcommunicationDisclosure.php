<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\EcommunicationDisclosure;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetDepartmentEcommunicationDisclosure
 *
 * Retrieves electronic communication disclosure for the specific department
 */
class GetDepartmentEcommunicationDisclosure extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/departments/{$this->departmentid}/ecommunicationdisclosure";
    }

    /**
     * @param int $departmentid departmentid
     */
    public function __construct(
        protected int $departmentid,
    )
    {
    }
}
