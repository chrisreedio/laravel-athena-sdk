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
        $modifiedAt = null;
        if (isset($data['lastmodified']) && $data['lastmodified'] !== '') {
            // The time this note was updated (mm/dd/yyyy hh24:mi:ss; Eastern time), if the note has been updated.
            $modifiedAt = Carbon::createFromFormat('m/d/Y H:i:s', $data['lastmodified'], 'America/New_York')
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
