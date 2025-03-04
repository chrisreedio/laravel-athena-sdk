<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\RequiredFieldsCheck;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * ListDepartmentCheckinRequiredFields
 *
 * Retrieves the list of mandatory fields required for check-in of a specific department
 */
class ListDepartmentCheckinRequiredFields extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/departments/{$this->departmentid}/checkinrequired";
    }

    /**
     * @param  int  $departmentid  departmentid
     */
    public function __construct(
        protected int $departmentid,
    ) {}

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json('fieldlist');
    }
}
