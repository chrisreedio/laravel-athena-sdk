<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\Transcription;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateTranscriptionNote
 *
 * Create a record of a transcription note for a specific patient stay in the hospital
 */
class CreateTranscriptionNote extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}/transcription/notes";
    }

    /**
     * @param  int  $departmentid The department ID tied to the note.
     * @param  string  $notetype Type of transcription note.
     * @param  int  $providerid The provider ID.
     * @param  int  $stayid stayid
     * @param  string  $transcriptionistname The legal name of the Transcriptionist who transcribed the note being posted.
     * @param  string  $transcriptionrecordeddatetime The date and time of dictation by the provider. Please convert this value to Eastern time and use the format MM/DD/YYYY HH24:MI:SS.
     * @param  string  $transcriptiontext Transcription text.
     * @param  null|int  $caseid Surgical case ID.
     */
    public function __construct(
        protected int $departmentid,
        protected string $notetype,
        protected int $providerid,
        protected int $stayid,
        protected string $transcriptionistname,
        protected string $transcriptionrecordeddatetime,
        protected string $transcriptiontext,
        protected ?int $caseid = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'notetype' => $this->notetype,
            'providerid' => $this->providerid,
            'transcriptionistname' => $this->transcriptionistname,
            'transcriptionrecordeddatetime' => $this->transcriptionrecordeddatetime,
            'transcriptiontext' => $this->transcriptiontext,
            'caseid' => $this->caseid,
        ]);
    }
}
