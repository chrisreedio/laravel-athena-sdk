<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\InboxTasks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAssignableUsers
 *
 * Retrieves a list of users in a department who can be assigned the inbox tasks
 */
class ListAssignableUsers extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/configuration/inbox/staff';
    }

    /**
     * @param  int  $departmentid  The athenaNet department id.
     */
    public function __construct(
        protected int $departmentid,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}
