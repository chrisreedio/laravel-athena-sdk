<?php

use ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment\ListAppointmentChanges;

it('uses the package config for leave_unprocessed query defaults', function () {
    athenaTestConfig(['leave_unprocessed' => true]);

    $request = new ListAppointmentChanges(
        departmentId: ['1', '2'],
        leaveUnprocessed: false,
        showPatientDetail: true,
    );

    expect($request->resolveEndpoint())->toBe('/appointments/changed')
        ->and($request->getItemsKey())->toBe('appointments')
        ->and($request->defaultQuery())->toBe([
            'departmentid' => ['1', '2'],
            'leaveunprocessed' => true,
            'showpatientdetail' => true,
        ]);
});
