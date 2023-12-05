<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\DepartmentsReference;

use ChrisReedIO\AthenaSDK\PaginatedRequest;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;

use function class_basename;
use function dd;

/**
 * ListDepartments
 *
 * Retrieves detailed information of the departments associated to a practice
 */
// class ListDepartments extends PaginatedRequest
class ListDepartments extends PaginatedRequest
{
    protected ?string $itemsKey = 'departments';

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/departments';
    }

    /**
     * @param  null|bool  $fullproviderlist If set to true, list providers who are configured to be able to see patients in this department. This list is most accurate when the department-providers configuration is actively maintained. This list is dependent on valid configuration. Warning: the configured list may be very large. Default is false.
     * @param  null|bool  $hospitalonly If set to true, return hospital only departments.
     * @param  null|bool  $providerlist If set to true, list providers who see patients in this department. Note that only providers that have booked appointments in the department will be listed. Default is false.
     * @param  null|bool  $showalldepartments By default, departments hidden in the portal do not appear. When this is set to true, that restriction is not applied. Default is false.
     */
    public function __construct(
        protected ?bool $fullproviderlist = null,
        protected ?bool $hospitalonly = null,
        protected ?bool $providerlist = null,
        protected ?bool $showalldepartments = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'fullproviderlist' => $this->fullproviderlist,
            'hospitalonly' => $this->hospitalonly,
            'providerlist' => $this->providerlist,
            'showalldepartments' => $this->showalldepartments,
        ]);
    }

    public function createDtoFromResponse(Response $response): array
    {

        try {
            // dd($response->json($this->itemsKey));
            return array_map(function (array $department) {
                $dept = [
                    'athena_id' => $department['departmentid'],
                    'name' => $department['patientdepartmentname'],
                    'phone' => $department['phone'] ?? null,
                    'address' => [
                        'street' => $department['address'],
                        'suite' => $department['address2'] ?? null,
                        'city' => $department['city'],
                        'state' => $department['state'],
                        'zip' => $department['zip'],
                    ],
                ];

                return array_filter($dept);
                // return new Department($department);
            }, $response->json($this->itemsKey));
        } catch (JsonException $e) {
            dump(class_basename(__CLASS__).': Failed to parse response body as JSON.');
            dd($e->getMessage());

            return [];
        }
    }
}
