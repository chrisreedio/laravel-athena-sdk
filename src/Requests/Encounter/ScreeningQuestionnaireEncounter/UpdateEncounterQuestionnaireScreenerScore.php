<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ScreeningQuestionnaireEncounter;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateEncounterQuestionnaireScreenerScore
 *
 * Modifies only the score of the questionnaire screener for the encounter
 */
class UpdateEncounterQuestionnaireScreenerScore extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/questionnairescreeners/scoreonly";
    }

    /**
     * @param  array  $documentids  A comma delimited array of document IDs to attach to the questionnaire. Ex: [4,5]. Currently this is only officially supported for documents with the subclass ENCOUNTERDOCUMENT_PATIENTHISTORY.
     * @param  int  $encounterid  encounterid
     * @param  int  $questionnaireid  The questionnaire ID to be updated. If the questionnaireid does not exist in the GET /chart/encounter/{encounterid}/questionnairescreeners API, please activate it via the POST API.
     * @param  null|array  $declinedreason  Not yet implemented. Reason the questionnaire is declined
     * @param  null|array  $metaquestions  Not yet implemented. Any meta questions related to this questionnaire. E.g., should this be considered generally as positive or negative?
     * @param  null|string  $note  The note for the questionnaire screener.
     * @param  null|string  $score  The score for the questionnaire screener. Screeners that have one or more scores should be entered in the NOTE field.
     */
    public function __construct(
        protected array $documentids,
        protected int $encounterid,
        protected int $questionnaireid,
        protected ?array $declinedreason = null,
        protected ?array $metaquestions = null,
        protected ?string $note = null,
        protected ?string $score = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'documentids' => $this->documentids,
            'questionnaireid' => $this->questionnaireid,
            'declinedreason' => $this->declinedreason,
            'metaquestions' => $this->metaquestions,
            'note' => $this->note,
            'score' => $this->score,
        ]);
    }
}
