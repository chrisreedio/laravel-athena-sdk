<?php

namespace ChrisReedIO\AthenaSDK\Data\Practice;

use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class LanguageData extends AthenaData
{
    public function __construct(
        public ?string $iso6392code = null,
        public ?string $name = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new static(
            iso6392code: $data['iso6392code'] ?? null,
            name: $data['name'] ?? null,
        );
    }
}
