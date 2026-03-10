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

```php
public function appointments(): Appointments;
public function departments(): Departments;
public function patients(): Patients;
public function providers(): Providers;
public function referringProviders(): ReferringProviders;
public function practice(): Practice;
public function encounters(): Encounters;
```

## Appointments

Top-level methods on `appointments()`:

```php
public function booked(): Booked;
public function subscriptions(): AppointmentSubscriptions;
public function types(): Types;
public function status(): AppointmentStatus;
public function checkin(): CheckInResource;
public function get(
    int $appointmentId,
    ?bool $includeClaim = null,
    ?bool $includeCopay = null,
    ?bool $includeInsurance = null,
    ?bool $includePatient = null,
): AppointmentData;
```

Current behavior note:
- `get(...)` currently fetches appointment details by appointment ID only. The optional include flags exist on the wrapper signature but are not currently forwarded to the underlying request.

### `appointments()->booked()`

```php
public function list(
    string $startdate,
    string $enddate,
    ?string $appointmentstatus = null,
    ?int $appointmenttypeid = null,
    ?array $confidentialitycode = null,
    ?int $departmentid = null,
    ?string $endlastmodified = null,
    ?bool $ignorerestrictions = null,
    ?int $patientid = null,
    ?array $providerid = null,
    ?string $scheduledenddate = null,
    ?string $scheduledstartdate = null,
    ?bool $showcancelled = null,
    ?bool $showclaimdetail = null,
    ?bool $showcopay = null,
    ?bool $showexpectedprocedurecodes = null,
    ?bool $showinsurance = null,
    ?bool $showpatientdetail = null,
    ?bool $showremindercalldetail = null,
    ?string $startlastmodified = null,
): LazyCollection;

public function listMultiDept(
    string $startdate,
    string $enddate,
    ?string $appointmentstatus = null,
    ?int $appointmenttypeid = null,
    ?array $confidentialitycode = null,
    ?array $departmentid = null,
    ?string $endlastmodified = null,
    ?bool $ignorerestrictions = null,
    ?array $patientid = null,
    ?array $providerid = null,
    ?string $scheduledenddate = null,
    ?string $scheduledstartdate = null,
    ?bool $showcancelled = null,
    ?bool $showclaimdetail = null,
    ?bool $showcopay = null,
    ?bool $showexpectedprocedurecodes = null,
    ?bool $showinsurance = null,
    ?bool $showpatientdetail = null,
    ?bool $showremindercalldetail = null,
    ?string $startlastmodified = null,
): LazyCollection;
```

### `appointments()->subscriptions()`

```php
public function events(): array;
public function list(): Collection;
public function subscribe(?string $eventName = null): Response;
public function unsubscribe(?string $eventName = null): Response;
public function changes(bool $leaveUnprocessed = false): LazyCollection;
```

### `appointments()->types()`

```php
public function list(): LazyCollection;
```

### `appointments()->status()`

```php
public function confirmation(): ConfirmationStatus;
```

#### `appointments()->status()->confirmation()`

```php
public function list(): Collection;
```

### `appointments()->checkin()`

```php
public function fields(string $departmentId): array;
public function validate(string $appointmentId): Response;
public function start(string $appointmentId): Response;
public function complete(string $appointmentId): Response;
public function cancel(string $appointmentId): Response;
```

## Departments

Top-level methods on `departments()`:

```php
public function list(bool $showAll = false): LazyCollection;
public function patientLocations(int $departmentId): Collection;
```

## Patients

Top-level methods on `patients()`:

```php
public function list(?string $departmentId = null): LazyCollection;
public function get(int $patientId): PatientData;
public function subscriptions(): PatientSubscriptions;
public function update(int $patientId, PatientData $patient): Response;
public function privacy(int $departmentId, int $patientId): PatientPrivacy;
public function chartAlert(int $patientId, int $departmentId): ChartAlert;
```

### `patients()->subscriptions()`

```php
public function events(): array;
public function list(): Collection;
public function subscribe(?string $eventName = null, ?array $departmentIds = null): Response;
public function unsubscribe(?string $eventName = null): Response;
public function changes(bool $leaveUnprocessed = false): LazyCollection;
```

### `patients()->privacy($departmentId, $patientId)`

```php
public function get(): array;
public function set(
    ?string $signatureName = null,
    ?DateTime $signatureDatetime = null,
    ?bool $privacySignature = null,
    ?bool $insuredSignature = null,
    ?bool $patientSignature = null,
    ?string $unableToSignReason = null,
): bool;
public function update(bool $newState): Response;
```

### `patients()->chartAlert($patientId, $departmentId)`

```php
public function create(string $note): bool;
public function get(): ?ChartAlertData;
public function update(string $note): bool;
public function delete(): bool;
```

## Providers

Top-level methods on `providers()`:

```php
public function list(): LazyCollection;
public function specialities(): LazyCollection;
public function subscriptions(): ProviderSubscriptions;
public function referring(): ReferringProviders;
```

### `providers()->subscriptions()`

```php
public function events(): array;
public function list(): Collection;
public function subscribe(?string $eventName = null): Response;
public function unsubscribe(?string $eventName = null): Response;
public function changes(bool $leaveUnprocessed = false): LazyCollection;
```

### `providers()->referring()`

```php
public function subscriptions(): ReferringProvidersSubscriptions;
public function list(): LazyCollection;
```

## Referring Providers

Top-level methods on `referringProviders()`:

```php
public function subscriptions(): ReferringProvidersSubscriptions;
public function list(): LazyCollection;
```

### `referringProviders()->subscriptions()`

```php
public function events(): array;
public function list(): Collection;
public function subscribe(?string $eventName = null): Response;
public function unsubscribe(?string $eventName = null): Response;
public function changes(bool $leaveUnprocessed = false): LazyCollection;
```

## Practice

Top-level methods on `practice()`:

```php
public function languages(): Collection;
public function races(): Collection;
public function ethnicities(): Collection;
```

## Encounters

Top-level methods on `encounters()`:

```php
public function statuses(): PatientStatus;
public function update(
    int $encounterId,
    ?int $patientLocationId = null,
    ?int $patientStatusId = null,
): bool;
```

### `encounters()->statuses()`

```php
public function list(): Collection;
```

## Stability Guidance

The resource wrappers above are the intended Laravel-facing surface for most applications.

Use the raw request classes directly only when:

- the resource wrapper does not expose the endpoint you need yet
- you are comfortable working at the Saloon request/response layer
- you are willing to absorb more change risk than the wrapper API documented here
