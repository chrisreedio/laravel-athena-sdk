<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ProviderReference;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateProvider
 *
 * BETA: Create a new record of provider in the system
 */
class CreateProvider extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/providers';
    }

    /**
     * @param  bool  $billable  This provider is a supervising provider and is credentialed to bill for services.
     * @param  int  $entitytypeid  The entity type of provider. 1 = person, 2 = non-person
     * @param  int  $medicalgroupid  The medical group of the provider.
     * @param  string  $schedulingname  The scheduling name of the provider.
     * @param  bool  $signatureonfileflag  This provider's signature is on file.
     * @param  null|bool  $acceptingnewpatients  Indicates whether the provider is accepting new patients. This field is currently only for informational purposes, and does not drive any athenaNet functionality.
     * @param  null|string  $alternatephone  The phone number of the provider.
     * @param  null|string  $ansicode  The provider taxonomy code of the provider.
     * @param  null|string  $billednamecase  The billing name of the provider.
     * @param  null|string  $communicatordisplayname  The communicator display name for the provider.
     * @param  null|int  $communicatorhomedepartment  The communicator home department for the provider.
     * @param  null|bool  $crdreferring  This provider is a Coordinator referring provider.
     * @param  null|bool  $createencounteroncheckin  Automatically create encounters at check-in.
     * @param  null|string  $directaddress  The direct email address for the provider.
     * @param  null|string  $firstname  The first name of the provider.
     * @param  null|bool  $hideinportal  Hide this provider in the Patient Portal.
     * @param  null|string  $lastname  The last name of the provider.
     * @param  null|string  $middleinitial  The middle name of the provider.
     * @param  null|string  $namesuffix  The suffix of the provider.
     * @param  null|string  $ndctatnumber  The NDC TAT number for this provider.
     * @param  null|int  $npinumber  The NPI of the provider.
     * @param  null|int  $personalpronounsid  The personal pronouns ID of the provider. See GET /personalpronouns for a mapping of ID to personal pronouns displaytext.
     * @param  null|int  $practiceroleid  The practice role ID for the provider.
     * @param  null|int  $providergroupid  The provider group of the provider.
     * @param  null|string  $providerprofileid  The provider profile of the provider (integer or 'NEW')
     * @param  null|string  $providertype  The abbreviation for the provider type of the provider. (e.g., MD, NP). See GET /reference/providertypes for a mapping of abbreviation to provider type.
     * @param  null|string  $reportingname  The reporting name for the provider.
     * @param  null|int  $scheduleresourcetypeid  The scheduling resource type id of the provider.
     * @param  null|string  $schedulingnote  The scheduling note for the provider.
     * @param  null|string  $sex  The sex of the provider (M or F)
     * @param  null|string  $specialtyid  The specialty ID of the provider. See GET /reference/providerspecialties for a mapping of ID to specialty name.
     * @param  null|int  $ssn  The SSN of the provider.
     * @param  null|bool  $staffbucket  Create a staff bucket for this provider.
     * @param  null|int  $supervisingproviderid  The supervising provider ID for this provider.
     * @param  null|string  $supervisingprovidertype  If set to self,set supervisingprovider to itself.
     * @param  null|bool  $trackmissingslips  This provider renders services that should be tracked on the Missing Slips Worklist.
     * @param  null|string  $username  The username for the provider.
     */
    public function __construct(
        protected bool $billable,
        protected int $entitytypeid,
        protected int $medicalgroupid,
        protected string $schedulingname,
        protected bool $signatureonfileflag,
        protected ?bool $acceptingnewpatients = null,
        protected ?string $alternatephone = null,
        protected ?string $ansicode = null,
        protected ?string $billednamecase = null,
        protected ?string $communicatordisplayname = null,
        protected ?int $communicatorhomedepartment = null,
        protected ?bool $crdreferring = null,
        protected ?bool $createencounteroncheckin = null,
        protected ?string $directaddress = null,
        protected ?string $firstname = null,
        protected ?bool $hideinportal = null,
        protected ?string $lastname = null,
        protected ?string $middleinitial = null,
        protected ?string $namesuffix = null,
        protected ?string $ndctatnumber = null,
        protected ?int $npinumber = null,
        protected ?int $personalpronounsid = null,
        protected ?int $practiceroleid = null,
        protected ?int $providergroupid = null,
        protected ?string $providerprofileid = null,
        protected ?string $providertype = null,
        protected ?string $reportingname = null,
        protected ?int $scheduleresourcetypeid = null,
        protected ?string $schedulingnote = null,
        protected ?string $sex = null,
        protected ?string $specialtyid = null,
        protected ?int $ssn = null,
        protected ?bool $staffbucket = null,
        protected ?int $supervisingproviderid = null,
        protected ?string $supervisingprovidertype = null,
        protected ?bool $trackmissingslips = null,
        protected ?string $username = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'billable' => $this->billable,
            'entitytypeid' => $this->entitytypeid,
            'medicalgroupid' => $this->medicalgroupid,
            'schedulingname' => $this->schedulingname,
            'signatureonfileflag' => $this->signatureonfileflag,
            'acceptingnewpatients' => $this->acceptingnewpatients,
            'alternatephone' => $this->alternatephone,
            'ansicode' => $this->ansicode,
            'billednamecase' => $this->billednamecase,
            'communicatordisplayname' => $this->communicatordisplayname,
            'communicatorhomedepartment' => $this->communicatorhomedepartment,
            'crdreferring' => $this->crdreferring,
            'createencounteroncheckin' => $this->createencounteroncheckin,
            'directaddress' => $this->directaddress,
            'firstname' => $this->firstname,
            'hideinportal' => $this->hideinportal,
            'lastname' => $this->lastname,
            'middleinitial' => $this->middleinitial,
            'namesuffix' => $this->namesuffix,
            'ndctatnumber' => $this->ndctatnumber,
            'npinumber' => $this->npinumber,
            'personalpronounsid' => $this->personalpronounsid,
            'practiceroleid' => $this->practiceroleid,
            'providergroupid' => $this->providergroupid,
            'providerprofileid' => $this->providerprofileid,
            'providertype' => $this->providertype,
            'reportingname' => $this->reportingname,
            'scheduleresourcetypeid' => $this->scheduleresourcetypeid,
            'schedulingnote' => $this->schedulingnote,
            'sex' => $this->sex,
            'specialtyid' => $this->specialtyid,
            'ssn' => $this->ssn,
            'staffbucket' => $this->staffbucket,
            'supervisingproviderid' => $this->supervisingproviderid,
            'supervisingprovidertype' => $this->supervisingprovidertype,
            'trackmissingslips' => $this->trackmissingslips,
            'username' => $this->username,
        ]);
    }
}
