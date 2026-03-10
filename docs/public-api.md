# Public API

This document describes the curated API surface exposed by `laravel-athena-sdk` through `AthenaConnector`, the `Athena` facade, and the resource wrappers under `src/Resources`.

The package also ships many raw Saloon request classes under `src/Requests`. Those classes are useful for lower-level integrations, but this document only treats the resource-oriented wrapper layer as the package's primary public API.

## Entry Points

Create a connector directly:

```php
use ChrisReedIO\AthenaSDK\AthenaConnector;

$athena = new AthenaConnector();
```

Or resolve the facade:

```php
use ChrisReedIO\AthenaSDK\Facades\Athena;

$appointments = Athena::appointments();
```

## Connector Resources

`AthenaConnector` exposes these top-level resources:

- `appointments(): Appointments`
- `departments(): Departments`
- `patients(): Patients`
- `providers(): Providers`
- `referringProviders(): ReferringProviders`
- `practice(): Practice`
- `encounters(): Encounters`

## Appointments

Top-level methods on `appointments()`:

- `booked(): Booked`
- `subscriptions(): AppointmentSubscriptions`
- `types(): Types`
- `status(): AppointmentStatus`
- `checkin(): CheckInResource`
- `get(int $appointmentId, ?bool $includeClaim = null, ?bool $includeCopay = null, ?bool $includeInsurance = null, ?bool $includePatient = null): AppointmentData`

Current behavior note:
- `get(...)` currently fetches appointment details by appointment ID only. The optional include flags exist on the wrapper signature but are not currently forwarded to the underlying request.

### `appointments()->booked()`

- `list(string $startdate, string $enddate, ?string $appointmentstatus = null, ?int $appointmenttypeid = null, ?array $confidentialitycode = null, ?int $departmentid = null, ?string $endlastmodified = null, ?bool $ignorerestrictions = null, ?int $patientid = null, ?array $providerid = null, ?string $scheduledenddate = null, ?string $scheduledstartdate = null, ?bool $showcancelled = null, ?bool $showclaimdetail = null, ?bool $showcopay = null, ?bool $showexpectedprocedurecodes = null, ?bool $showinsurance = null, ?bool $showpatientdetail = null, ?bool $showremindercalldetail = null, ?string $startlastmodified = null): LazyCollection`
- `listMultiDept(string $startdate, string $enddate, ?string $appointmentstatus = null, ?int $appointmenttypeid = null, ?array $confidentialitycode = null, ?array $departmentid = null, ?string $endlastmodified = null, ?bool $ignorerestrictions = null, ?array $patientid = null, ?array $providerid = null, ?string $scheduledenddate = null, ?string $scheduledstartdate = null, ?bool $showcancelled = null, ?bool $showclaimdetail = null, ?bool $showcopay = null, ?bool $showexpectedprocedurecodes = null, ?bool $showinsurance = null, ?bool $showpatientdetail = null, ?bool $showremindercalldetail = null, ?string $startlastmodified = null): LazyCollection`

### `appointments()->subscriptions()`

- `events(): array`
- `list(): Collection`
- `subscribe(?string $eventName = null): Response`
- `unsubscribe(?string $eventName = null): Response`
- `changes(bool $leaveUnprocessed = false): LazyCollection`

### `appointments()->types()`

- `list(): LazyCollection`

### `appointments()->status()`

- `confirmation(): ConfirmationStatus`

#### `appointments()->status()->confirmation()`

- `list(): Collection`

### `appointments()->checkin()`

- `fields(string $departmentId): array`
- `validate(string $appointmentId): Response`
- `start(string $appointmentId): Response`
- `complete(string $appointmentId): Response`
- `cancel(string $appointmentId): Response`

## Departments

Top-level methods on `departments()`:

- `list(bool $showAll = false): LazyCollection`
- `patientLocations(int $departmentId): Collection`

## Patients

Top-level methods on `patients()`:

- `list(?string $departmentId = null): LazyCollection`
- `get(int $patientId): PatientData`
- `subscriptions(): PatientSubscriptions`
- `update(int $patientId, PatientData $patient): Response`
- `privacy(int $departmentId, int $patientId): PatientPrivacy`
- `chartAlert(int $patientId, int $departmentId): ChartAlert`

### `patients()->subscriptions()`

- `events(): array`
- `list(): Collection`
- `subscribe(?string $eventName = null, ?array $departmentIds = null): Response`
- `unsubscribe(?string $eventName = null): Response`
- `changes(bool $leaveUnprocessed = false): LazyCollection`

### `patients()->privacy($departmentId, $patientId)`

- `get(): array`
- `set(?string $signatureName = null, ?DateTime $signatureDatetime = null, ?bool $privacySignature = null, ?bool $insuredSignature = null, ?bool $patientSignature = null, ?string $unableToSignReason = null): bool`
- `update(bool $newState): Response`

### `patients()->chartAlert($patientId, $departmentId)`

- `create(string $note): bool`
- `get(): ?ChartAlertData`
- `update(string $note): bool`
- `delete(): bool`

## Providers

Top-level methods on `providers()`:

- `list(): LazyCollection`
- `specialities(): LazyCollection`
- `subscriptions(): ProviderSubscriptions`
- `referring(): ReferringProviders`

### `providers()->subscriptions()`

- `events(): array`
- `list(): Collection`
- `subscribe(?string $eventName = null): Response`
- `unsubscribe(?string $eventName = null): Response`
- `changes(bool $leaveUnprocessed = false): LazyCollection`

### `providers()->referring()`

- `subscriptions(): ReferringProvidersSubscriptions`
- `list(): LazyCollection`

## Referring Providers

Top-level methods on `referringProviders()`:

- `subscriptions(): ReferringProvidersSubscriptions`
- `list(): LazyCollection`

### `referringProviders()->subscriptions()`

- `events(): array`
- `list(): Collection`
- `subscribe(?string $eventName = null): Response`
- `unsubscribe(?string $eventName = null): Response`
- `changes(bool $leaveUnprocessed = false): LazyCollection`

## Practice

Top-level methods on `practice()`:

- `languages(): Collection`
- `races(): Collection`
- `ethnicities(): Collection`

## Encounters

Top-level methods on `encounters()`:

- `statuses(): PatientStatus`
- `update(int $encounterId, ?int $patientLocationId = null, ?int $patientStatusId = null): bool`

### `encounters()->statuses()`

- `list(): Collection`

## Stability Guidance

The resource wrappers above are the intended Laravel-facing surface for most applications.

Use the raw request classes directly only when:

- the resource wrapper does not expose the endpoint you need yet
- you are comfortable working at the Saloon request/response layer
- you are willing to absorb more change risk than the wrapper API documented here
