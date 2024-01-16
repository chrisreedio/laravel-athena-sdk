<?php

namespace ChrisReedIO\AthenaSDK\Resources;

use ChrisReedIO\AthenaSDK\Data\Department\DepartmentData;
use ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\DepartmentsReference\ListDepartments;
use ChrisReedIO\AthenaSDK\Resource;
use Illuminate\Support\LazyCollection;

class Departments extends Resource
{
    /**
     * @return LazyCollection<DepartmentData>
     */
    public function list(bool $showAll = false): LazyCollection
    {
        return $this->connector->paginate(new ListDepartments(showalldepartments: $showAll))->collect();
    }
}
