<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use ChrisReedIO\AthenaSDK\Data\AthenaData;
use Illuminate\Support\Str;

readonly class PatientBalanceData extends AthenaData
{
    public function __construct(
        public ?array $departmentList = null,
        public ?string $balance = null,
        public ?string $collectionsBalance = null,
        public ?bool $cleanBalance = null,
        public ?int $providerGroupId = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new static(
            departmentList: isset($data['departmentlist']) && is_string($data['departmentlist'])
                ? collect(Str::of($data['departmentlist'])->explode(','))
                    ->map(static fn (string $departmentId): string => trim($departmentId))
                    ->reject(static fn (string $departmentId): bool => $departmentId === '')
                    ->map(static fn (string $departmentId): int => (int) $departmentId)
                    ->values()
                    ->all()
                : null,
            balance: $data['balance'] ?? null,
            collectionsBalance: $data['collectionsbalance'] ?? null,
            cleanBalance: self::toBool($data['cleanbalance'] ?? null),
            providerGroupId: isset($data['providergroupid']) ? (int) $data['providergroupid'] : null,
        );
    }
}
