<?php

namespace ChrisReedIO\AthenaSDK;

// use ChrisReedIO\AthenaSDK\Resource\Appointments;
use ChrisReedIO\AthenaSDK\Resources\Appointments;
use ChrisReedIO\AthenaSDK\Resources\Departments;
use ChrisReedIO\AthenaSDK\Resources\Patients;
use ChrisReedIO\AthenaSDK\Resources\Providers;
use Exception;
// use Illuminate\Http\Request;
use ReflectionException;
use Saloon\Exceptions\OAuthConfigValidationException;
use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\OffsetPaginator;
use Saloon\Traits\OAuth2\ClientCredentialsGrant;
use Throwable;

use function class_basename;

class AthenaConnector extends Connector implements HasPagination
{
    use ClientCredentialsGrant;

    protected ?string $baseUrl = null;

    /**
     * @throws Exception if the base_url or practice_id are not set in the config file, or if the SDK fails to authenticate
     */
    public function __construct(protected ?string $practiceId = null)
    {
        $this->baseUrl = config('athena-sdk.base_url');
        if (empty($this->baseUrl)) {
            throw new \Exception('Athena SDK base_url not set in config/athena-sdk.php');
        }

        $this->practiceId ??= config('athena-sdk.practice_id');
        if (empty($this->practiceId)) {
            throw new \Exception('Athena SDK practice_id not set in config/athena-sdk.php');
        }

        // Attempt to set up authentication
        try {
            $authenticator = $this->getAccessToken();
            $this->authenticate($authenticator);
        } catch (ReflectionException|OAuthConfigValidationException|Throwable $e) {
            throw new \Exception('Athena SDK failed to authenticate: '.$e->getMessage());
        }

    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl.'/v1/'.$this->practiceId;
    }

    protected function defaultOauthConfig(): OAuthConfig
    {
        return OAuthConfig::make()
            ->setClientId(config('athena-sdk.client_id'))
            ->setClientSecret(config('athena-sdk.client_secret'))
            ->setTokenEndpoint($this->baseUrl.'/oauth2/v1/token')
            ->setDefaultScopes(['athena/service/Athenanet.MDP.*']);
    }

    public function paginate(Request $request): OffsetPaginator
    {
        return new class(connector: $this, request: $request) extends OffsetPaginator
        {
            protected ?int $perPageLimit = 500;

            protected function isLastPage(Response $response): bool
            {
                return $this->getOffset() >= (int) $response->json('totalcount');
            }

            protected function getPageItems(Response $response, Request $request): array
            {
                if (! $request instanceof PaginatedRequest) {
                    throw new \Exception(class_basename($request).' must extend PaginatedRequest');
                }

                $itemsKey = $request->getItemsKey();
                if (! $itemsKey) {
                    throw new \Exception(class_basename($request).' must set itemsKey');
                }

                // if ($response->)
                try {
                    $dtoResult = $response->dtoOrFail();
                } catch (Throwable $e) {
                    // throw new \Exception(class_basename($request).' failed to parse response body as JSON: '.$e->getMessage());
                    dd($e->getMessage());
                }
                if (!$dtoResult) {
                    return $response->json($itemsKey);
                    // throw new \Exception('Failed to parse response body as JSON.');
                }
                return $dtoResult;

            }
        };
    }

    //region Resources
    public function appointments(): Appointments
    {
        return new Appointments($this);
    }

    public function departments(): Departments
    {
        return new Departments($this);
    }

    public function patients(): Patients
    {
        return new Patients($this);
    }

    public function providers(): Providers
    {
        return new Providers($this);
    }
    //endregion
}
