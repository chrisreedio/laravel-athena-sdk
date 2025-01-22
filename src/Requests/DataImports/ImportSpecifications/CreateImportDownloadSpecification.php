<?php

namespace ChrisReedIO\AthenaSDK\Requests\DataImports\ImportSpecifications;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateImportDownloadSpecification
 *
 * Generates import specification and uploads the specification in the provided destination path.
 */
class CreateImportDownloadSpecification extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/import/downloadspecification';
    }

    /**
     * @param  string  $destinationpath  The path where the specification file needs to be uploaded (e.g. s3://bucketname/subpath). It could be a s3 or wasabi bucket path. Note: Bucket access should be shared before the request is initiated.
     * @param  string  $importtype  List of comma separated Import type(s) for which specification needs to be downloaded. Supported import types are: <ul> <li>All (Download spec for all import type)</li> <li>Patient Demographics</li> <li>Client record numbers</li> <li>Patient Appointment</li> <li>Appointment Ticklers</li> <li>Problems</li> <li>Allergies</li> <li>Medications</li> <li>Immunizations</li> <li>Vitals</li> <li>Notes Fields</li> <li>Chart Alert</li> <li>Family History</li> <li>GYN History</li> <li>OB History</li> <li>Past Medical History</li> <li>Past Pregnancies</li> <li>Social History</li> <li>Surgical History</li> <li>Perinatal History</li> <li>Documents</li> <li>Lab Results</li> <li>CCDA</li> <li>Department</li> <li>Department Numbers</li> <li>Provider</li> <li>Provider Numbers</li> <li>Referring Provider</li> <li>Usernames</li> </ul>
     * @param  null|string  $identityname  Name to identify the credentials for the bucket from athena vault. If it is not available, bucket name will be used.
     */
    public function __construct(
        protected string $destinationpath,
        protected string $importtype,
        protected ?string $identityname = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'destinationpath' => $this->destinationpath,
            'importtype' => $this->importtype,
            'identityname' => $this->identityname,
        ]);
    }
}
