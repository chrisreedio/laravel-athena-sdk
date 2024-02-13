<?php

namespace ChrisReedIO\AthenaSDK\Resources\Patients;

use ChrisReedIO\AthenaSDK\AthenaConnector;
use ChrisReedIO\AthenaSDK\Requests\Patient\PrivacyInformationVerification\GetPatientPrivacyInformationVerified;
use ChrisReedIO\AthenaSDK\Requests\Patient\PrivacyInformationVerification\UpdatePatientPrivacyInformationVerified;
use ChrisReedIO\AthenaSDK\Resource;
use DateTime;

use function now;

class PatientPrivacy extends Resource
{
    public function __construct(
        protected AthenaConnector $connector,
        protected int $departmentId,
        protected int $patientId
    ) {
    }

    public function get(): array
    {
        $request = new GetPatientPrivacyInformationVerified($this->departmentId, $this->patientId);

        return $this->connector->send($request)->json();
    }

    public function set(
        ?string $signatureName = null,
        ?DateTime $signatureDatetime = null,
        ?bool $privacySignature = null,
        ?bool $insuredSignature = null,
        ?bool $patientSignature = null,
        ?string $unableToSignReason = null,

    ): bool {
        $signatureDatetime ??= now();

        $request = new UpdatePatientPrivacyInformationVerified(
            $this->departmentId,
            $this->patientId,
            $signatureName,
            $signatureDatetime?->format('Y-m-d H:i:s'),
            null,
            $insuredSignature,
            $patientSignature,
            $privacySignature,
        );

        return $this->connector->send($request)->successful();
    }

    // public function approve(): bool
    // {
    //     $request = new UpdatePatientPrivacyInformationVerified(
    //         $this->departmentId,
    //         $this->patientId,
    //         insuredsignature: true,
    //         patientsignature: true,
    //         privacynotice: true,
    //     );
    //
    //     return $this->connector->send($request)->successful();
    // }

    public function update(bool $newState): bool
    {
        $request = new UpdatePatientPrivacyInformationVerified(
            $this->departmentId,
            $this->patientId,
            ($newState)
                ? now()->setTimezone('America/Chicago')->format('Y-m-d H:i:s') : null,
            insuredsignature: $newState,
            patientsignature: $newState,
            privacynotice: $newState,
        );

        return $this->connector->send($request)->successful();
    }
}
