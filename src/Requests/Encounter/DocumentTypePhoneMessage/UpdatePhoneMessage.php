<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePhoneMessage;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePhoneMessage
 *
 * Modifies a specific phone message document
 */
class UpdatePhoneMessage extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/documents/phonemessage/{$this->phonemessageid}";
    }

    /**
     * @param  int  $phonemessageid  phonemessageid
     * @param  null|int  $documenttypeid  A specific document type identifier.
     * @param  null|string  $internalnote  An internal note for the provider or staff. Updating this will append to any previous notes.
     * @param  null|string  $priority  Priority of this result.  1 is high; 2 is normal.
     * @param  null|int  $providerid  The ID of the ordering provider.
     */
    public function __construct(
        protected int $phonemessageid,
        protected ?int $documenttypeid = null,
        protected ?string $internalnote = null,
        protected ?string $priority = null,
        protected ?int $providerid = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'documenttypeid' => $this->documenttypeid,
            'internalnote' => $this->internalnote,
            'priority' => $this->priority,
            'providerid' => $this->providerid,
        ]);
    }
}
