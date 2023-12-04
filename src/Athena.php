<?php

namespace ChrisReedIO\AthenaSDK;

// use ChrisReedIO\AthenaSDK\Resource\Appointments;
use Illuminate\Http\Request;
use OAuth;
use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Connector;
use Saloon\Traits\OAuth2\ClientCredentialsGrant;

class Athena extends Connector
{
    use ClientCredentialsGrant;

    protected ?string $baseUrl = null;

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
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl . '/v1/' . $this->practiceId;
    }

    protected function defaultOauthConfig(): OAuthConfig
    {
        return OAuthConfig::make()
            ->setClientId(config('athena-sdk.client_id'))
            ->setClientSecret(config('athena-sdk.client_secret'))
            // ->setTokenEndpoint('/oauth/token')
            ->setTokenEndpoint( $this->baseUrl . '/oauth2/v1/token')
            ->setDefaultScopes(['athena/service/Athenanet.MDP.*']);
            // ->setRequestModifier(function (Request $request) {
            //     // $request->headers->set('Accept', 'application/json');
            // });
    }

    // public function appointments(): Appointments
    // {
    //     return new Appointments($this);
    // }
}
