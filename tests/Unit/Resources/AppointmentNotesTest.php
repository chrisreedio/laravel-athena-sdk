<?php

use ChrisReedIO\AthenaSDK\AthenaConnector;
use ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentNotes\CreateAppointmentNote;
use ChrisReedIO\AthenaSDK\Resources\Appointments;
use ChrisReedIO\AthenaSDK\Resources\Appointments\AppointmentNotes as AppointmentNotesResource;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('creates appointment notes through the appointment notes resource', function () {
    athenaTestConfig();
    cacheAthenaToken();

    $mockClient = new MockClient([
        MockResponse::make(),
    ]);

    $connector = (new AthenaConnector)->withMockClient($mockClient);
    $appointments = new Appointments($connector);
    $resource = $appointments->notes(12345);

    expect($resource)->toBeInstanceOf(AppointmentNotesResource::class);

    $resource->create('Patient tolerated procedure', true);

    $recorded = $mockClient->getRecordedResponses()[0];
    $request = $recorded->getPendingRequest();

    expect($request->getRequest())->toBeInstanceOf(CreateAppointmentNote::class)
        ->and($request->body()->all())->toBe([
            'notetext' => 'Patient tolerated procedure',
            'displayonschedule' => true,
        ]);
});
