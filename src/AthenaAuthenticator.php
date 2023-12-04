<?php

namespace ChrisReedIO\AthenaSDK;

// use ChrisReedIO\AthenaSDK\Resource\Appointments;
use Illuminate\Http\Request;
use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Connector;
use Saloon\Traits\OAuth2\ClientCredentialsGrant;

class AthenaAuthenticator extends Connector
{
    use ClientCredentialsGrant;

    protected ?string $baseUrl = null;

    public function __construct()
    {
        $this->baseUrl = config('athena-sdk.base_url');
        if (empty($this->baseUrl)) {
            throw new \Exception('Athena SDK base_url not set in config/athena-sdk.php');
        }
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl;
    }

    protected function defaultOauthConfig(): OAuthConfig
    {
        return OAuthConfig::make()
            ->setClientId(config('athena-sdk.client_id'))
            ->setClientSecret(config('athena-sdk.client_secret'))
            ->setTokenEndpoint('/oauth2/v1/token')
            ->setDefaultScopes(['athena/service/Athenanet.MDP.*'])
            ->setRequestModifier(function (Request $request) {
                // $request->headers->set('Accept', 'application/json');
            });
    }
}
