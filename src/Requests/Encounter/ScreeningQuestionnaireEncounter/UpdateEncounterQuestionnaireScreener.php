<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ScreeningQuestionnaireEncounter;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateEncounterQuestionnaireScreener
 *
 * Modifies the questionnaire screeners for the encounter
 */
class UpdateEncounterQuestionnaireScreener extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/questionnairescreeners";
    }

    /**
     * @param  int  $encounterid encounterid
     * @param  array  $documentids The document ID to attach to the questionnaire.  Multiple documents (either as a comma delimited list or multiple body parameters) are allowed.
     * @param  int  $questionnaireid The questionnaire ID to be updated. If the questionnaireid does not exist in the GET /chart/encounter/{encounterid}/questionnairescreeners API, please activate it via the POST API.
     * @param  array  $questions A JSON array of questions that contain a questionid and answer.
     * @param  string  $score The score for the questionnaire screener. This is not automatically updated based on the questions and answers passed in.
     * @param  null|array  $declinedreason Not yet implemented. Reason the questionnaire is declined
     * @param  null|string  $guidelines The guidelines given by the score and questionnaire.
     * @param  null|bool  $ignorescore If true, will ignore the score provided and treat it as not scored
     * @param  null|array  $metaquestions Not yet implemented. Any meta questions related to this questionnaire. E.g., should this be considered generally as positive or negative?
     * @param  null|string  $note The note for the questionnaire screener.
     * @param  null|string  $state The state of the questionnaire. This is used exclusively for the PHQ2/9 screeners. If this is not explicitly passed in, the default behavior will set the state to a PHQ2 on a score lower than 3, otherwise it will be set to a PHQ9.
     */
    public function __construct(
        protected int $encounterid,
        protected array $documentids,
        protected int $questionnaireid,
        protected array $questions,
        protected string $score,
        protected ?array $declinedreason = null,
        protected ?string $guidelines = null,
        protected ?bool $ignorescore = null,
        protected ?array $metaquestions = null,
        protected ?string $note = null,
        protected ?string $state = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'documentids' => $this->documentids,
            'questionnaireid' => $this->questionnaireid,
            'questions' => $this->questions,
            'score' => $this->score,
            'declinedreason' => $this->declinedreason,
            'guidelines' => $this->guidelines,
            'ignorescore' => $this->ignorescore,
            'metaquestions' => $this->metaquestions,
            'note' => $this->note,
            'state' => $this->state,
        ]);
    }
}
