<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use ChrisReedIO\AthenaSDK\Data\AthenaData;
use DateTime;
use Illuminate\Support\Carbon;

readonly class ChartAlertData extends AthenaData
{
    public function __construct(
        public ?string $noteText = null,
        public ?string $lastModifiedBy = null,
        public ?DateTime $lastModified = null,
    ) {

    }

    public static function fromArray(array $data): static
    {
        $modifiedAt = $data['lastmodified'] ?? null;
        if (! empty($modifiedAt)) {
            // The time this note was updated (mm/dd/yyyy hh24:mi:ss; Eastern time), if the note has been updated.
            // Note the docs are wrong, it's a two digit year
            $modifiedAt = Carbon::createFromFormat('m/d/y H:i:s', $data['lastmodified'], 'America/New_York')
                ->setTimezone('UTC')
                ->toDateTime();
        }

        return new static(
            noteText: $data['notetext'] ?? null,
            lastModifiedBy: $data['lastmodifiedby'] ?? null,
            lastModified: $modifiedAt,
        );
    }
}
