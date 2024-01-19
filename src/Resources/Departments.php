<?php

namespace ChrisReedIO\AthenaSDK\Resources;

use ChrisReedIO\AthenaSDK\Data\Department\DepartmentData;
use ChrisReedIO\AthenaSDK\Data\Practice\PatientLocationData;
use ChrisReedIO\AthenaSDK\Requests\Encounter\Chart\ListPatientLocations;
use ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\DepartmentsReference\ListDepartments;
use ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\LanguagesReference\ListLanguages;
use ChrisReedIO\AthenaSDK\Resource;
use Illuminate\Support\Collection;
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

    /**
     * @return Collection<PatientLocationData>
     */
    public function patientLocations(int $departmentId): Collection
    {
        // dump('Running patientLocations : '.$departmentId);
        // $request = new ListPatientLocations($departmentId);
        // $request = new ListLanguages();

        // dump('Executing request...');
        // $response = $this->connector->send($request);
        // dump('Ran patientLocations');
        // dd('done');
        // dd($response->json());

        return $this->connector->send(new ListPatientLocations(intval($departmentId)))->dtoOrFail();
    }
}
