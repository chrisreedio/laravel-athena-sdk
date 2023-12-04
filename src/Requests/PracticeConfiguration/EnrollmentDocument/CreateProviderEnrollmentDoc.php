<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\EnrollmentDocument;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateProviderEnrollmentDoc
 *
 * Modifies a set of enrollment documents for the given provider
 */
class CreateProviderEnrollmentDoc extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/providers/{$this->providerprofileid}/enrollmentdocs";
    }

    /**
     * @param  int  $providerprofileid providerprofileid
     * @param  string  $document 64 bit encoded PNG image
     * @param  string  $enrollmentcategoryid The ID of the enrollment category for the document (i.e. the type of document)
     * @param  string  $entity Type of entity (PROVIDER or MEDICALGROUP)
     * @param  string  $entityid The ID of the ENTITY
     * @param  string  $taskid The full enrollment task ID where the document is stored
     * @param  string  $username Username the database update will be logged under
     */
    public function __construct(
        protected int $providerprofileid,
        protected string $document,
        protected string $enrollmentcategoryid,
        protected string $entity,
        protected string $entityid,
        protected string $taskid,
        protected string $username,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'document' => $this->document,
            'enrollmentcategoryid' => $this->enrollmentcategoryid,
            'entity' => $this->entity,
            'entityid' => $this->entityid,
            'taskid' => $this->taskid,
            'username' => $this->username,
        ]);
    }
}
