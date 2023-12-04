<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\Transcription;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListTranscriptionNotes
 *
 * Retrieves all the transcription notes for a specific patient's stay in the hospital.
 */
class ListTranscriptionNotes extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}/transcription/notes";
    }

    /**
     * @param int $stayid stayid
     * @param null|int $departmentid The department ID tied to the note.
     * @param null|string $notetype Type of transcription note.
     */
    public function __construct(
        protected int     $stayid,
        protected ?int    $departmentid = null,
        protected ?string $notetype = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'notetype' => $this->notetype
        ]);
    }
}
