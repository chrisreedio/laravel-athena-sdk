<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\PhysicalExam;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePhysicalExamFindings
 *
 * Modifies a Physical Exam summary for a specific encounter
 */
class UpdatePhysicalExamFindings extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/physicalexam";
    }

    /**
     * @param  int  $encounterid encounterid
     * @param  null|array  $physicalexam This is a JSON structure containing everything you want the Physical Exam to now contain.  If you call the GET version of this call you can see some sample output.  It is extremely important to note that anything you pass in will become the new Physical Exam data. Even if you only wish to make an addition, you will need to pass in the whole output of the GET plus your addition, otherwise anything you don't pass in will be removed.
     * @param  null|bool  $replacesectionnote If true, will replace the existing section note with the new one. If false, will append to the existing note.
     * @param  null|string  $sectionnote The text to be updated to the physical exam section note for this encounter.
     * @param  null|array  $templateids This is a JSON array of the template ids that should remain on (or be added to) the Physical Exam.  Any template ids not included in this list will be removed from the Physical Exam.
     */
    public function __construct(
        protected int $encounterid,
        protected ?array $physicalexam = null,
        protected ?bool $replacesectionnote = null,
        protected ?string $sectionnote = null,
        protected ?array $templateids = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'physicalexam' => $this->physicalexam,
            'replacesectionnote' => $this->replacesectionnote,
            'sectionnote' => $this->sectionnote,
            'templateids' => $this->templateids,
        ]);
    }
}
