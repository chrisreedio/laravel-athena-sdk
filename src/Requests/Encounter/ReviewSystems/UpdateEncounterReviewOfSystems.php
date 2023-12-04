<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ReviewSystems;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateEncounterReviewOfSystems
 *
 * Modifies the Physical Exam summary for a specific encounter
 */
class UpdateEncounterReviewOfSystems extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/reviewofsystems";
    }

    /**
     * @param int $encounterid encounterid
     * @param null|bool $hpitoros Whether ROS is as noted in HPI.
     * @param null|bool $replacesectionnote If true, will replace the existing section note with the new one. If false, will append to the existing note.
     * @param null|string $reportedby
     *                     The type of person who reported information for the review of systems template. One of Patient, Parent, Caregiver, or Staff.
     *                  This will always be set to null if you do not pass any templateids even if you set this to a non null value in the API. This is because this field is only valid when there is an ROS template added to the encounter.
     * @param null|array $reviewofsystems This is a JSON structure containing everything you want the ROS to now contain.  If you call the GET version of this call you can see some sample output.  It is extremely important to note that anything you pass in will become the new ROS. Even if you only wish to make an addition, you will need to pass in the whole output of the GET plus your addition, otherwise anything you don't pass in will be removed.
     * @param null|string $sectionnote The text to be updated to the review of systems section note for this encounter.
     * @param null|array $templateids This is a JSON array of the template ids that should remain on (or be added to) the ROS. Any template ids not included in this list will be removed from the ROS.
     * @param null|bool $wellchildreplacesectionnote If true, will replace the existing well child section note with the new one. If false, will append to the existing note.
     * @param null|string $wellchildreportedby
     *                     The type of person who reported information for the well child review of systems template. One of Patient, Parent, Caregiver, or Staff.
     *                  This will always be set to null if you do not pass any wellchildtemplateids even if you set this to a non null value in the API. This is because this field is only valid when there is a Well Child ROS template added to the encounter.
     * @param null|array $wellchildros This is a JSON structure containing everything you want the well child ROS to now contain.  If you call the GET version of this call you can see some sample output.  It is extremely important to note that anything you pass in will become the new well child ROS. Even if you only wish to make an addition, you will need to pass in the whole output of the GET plus your addition, otherwise anything you don't pass in will be removed.
     * @param null|string $wellchildsectionnote The text to be updated to the well child review of systems section note for this encounter.
     * @param null|array $wellchildtemplateids This is a JSON array of the well child template ids that should remain on (or be added to) the ROS. Any template ids not included in this list will be removed from the well child ROS section.
     */
    public function __construct(
        protected int     $encounterid,
        protected ?bool   $hpitoros = null,
        protected ?bool   $replacesectionnote = null,
        protected ?string $reportedby = null,
        protected ?array  $reviewofsystems = null,
        protected ?string $sectionnote = null,
        protected ?array  $templateids = null,
        protected ?bool   $wellchildreplacesectionnote = null,
        protected ?string $wellchildreportedby = null,
        protected ?array  $wellchildros = null,
        protected ?string $wellchildsectionnote = null,
        protected ?array  $wellchildtemplateids = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'hpitoros' => $this->hpitoros,
            'replacesectionnote' => $this->replacesectionnote,
            'reportedby' => $this->reportedby,
            'reviewofsystems' => $this->reviewofsystems,
            'sectionnote' => $this->sectionnote,
            'templateids' => $this->templateids,
            'wellchildreplacesectionnote' => $this->wellchildreplacesectionnote,
            'wellchildreportedby' => $this->wellchildreportedby,
            'wellchildros' => $this->wellchildros,
            'wellchildsectionnote' => $this->wellchildsectionnote,
            'wellchildtemplateids' => $this->wellchildtemplateids,
        ]);
    }
}
