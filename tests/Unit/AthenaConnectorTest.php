<?php

use ChrisReedIO\AthenaSDK\AthenaConnector;
use ChrisReedIO\AthenaSDK\Resources\Appointments;
use ChrisReedIO\AthenaSDK\Resources\Departments;
use ChrisReedIO\AthenaSDK\Resources\Encounters;
use ChrisReedIO\AthenaSDK\Resources\Patients;
use ChrisReedIO\AthenaSDK\Resources\Practice;
use ChrisReedIO\AthenaSDK\Resources\Providers;
use Illuminate\Contracts\Cache\Lock;
use Illuminate\Support\Facades\Cache;
use Saloon\Contracts\OAuthAuthenticator;
use Saloon\Http\Auth\AccessTokenAuthenticator;
use Saloon\Http\Response;

beforeEach(function () {
    Cache::forget('athena_access_token');
});

it('requires a base url in config', function () {
    athenaTestConfig(['base_url' => '']);

    expect(fn () => new AthenaConnector)->toThrow(Exception::class, 'Athena SDK base_url not set');
});

it('requires a practice id in config', function () {
    athenaTestConfig(['practice_id' => '']);

    expect(fn () => new AthenaConnector)->toThrow(Exception::class, 'Athena SDK practice_id not set');
});

it('builds the practice base url from config', function () {
    athenaTestConfig([
        'base_url' => 'https://example.athena.test',
        'practice_id' => '222333',
    ]);
    cacheAthenaToken();

    $connector = new AthenaConnector;

    expect($connector->resolveBaseUrl())->toBe('https://example.athena.test/v1/222333');
});

it('allows overriding the practice id in the constructor', function () {
    athenaTestConfig([
        'base_url' => 'https://example.athena.test',
        'practice_id' => '222333',
    ]);
    cacheAthenaToken();

    $connector = new AthenaConnector('999888');

    expect($connector->resolveBaseUrl())->toBe('https://example.athena.test/v1/999888');
});

it('creates top level resource accessors without contacting the network', function () {
    athenaTestConfig();
    cacheAthenaToken();

    $connector = new AthenaConnector;

    expect($connector->appointments())->toBeInstanceOf(Appointments::class)
        ->and($connector->departments())->toBeInstanceOf(Departments::class)
        ->and($connector->patients())->toBeInstanceOf(Patients::class)
        ->and($connector->providers())->toBeInstanceOf(Providers::class)
        ->and($connector->referringProviders())->toBeInstanceOf(Providers\ReferringProviders::class)
        ->and($connector->practice())->toBeInstanceOf(Practice::class)
        ->and($connector->encounters())->toBeInstanceOf(Encounters::class);
});

it('fetches and caches an access token when the cache is empty', function () {
    athenaTestConfig();

    $authenticator = new AccessTokenAuthenticator('fresh-access-token', null, new DateTimeImmutable('+1 hour'));

    $connector = new class($authenticator) extends AthenaConnector
    {
        public int $accessTokenCalls = 0;

        public function __construct(private readonly OAuthAuthenticator $testAuthenticator)
        {
            parent::__construct();
        }

        public function getAccessToken(array $scopes = [], string $scopeSeparator = ' ', bool $returnResponse = false, ?callable $requestModifier = null): OAuthAuthenticator|Response
        {
            $this->accessTokenCalls++;

            return $this->testAuthenticator;
        }
    };

    expect($connector->accessTokenCalls)->toBe(1)
        ->and(Cache::get('athena_access_token')->getAccessToken())->toBe('fresh-access-token');
});

it('rechecks the token cache inside the lock before fetching a new token', function () {
    athenaTestConfig();

    $cachedAuthenticator = new AccessTokenAuthenticator('locked-worker-token', null, new DateTimeImmutable('+1 hour'));

    Cache::shouldReceive('get')
        ->with('athena_access_token')
        ->twice()
        ->andReturn(null, $cachedAuthenticator);

    Cache::shouldReceive('lock')
        ->with('athena_access_token_lock', 30)
        ->once()
        ->andReturn(new class implements Lock
        {
            public function get($callback = null)
            {
                return $callback ? $callback() : true;
            }

            public function block($seconds, $callback = null)
            {
                expect($seconds)->toBe(10);

                return $callback ? $callback() : true;
            }

            public function release(): bool
            {
                return true;
            }

            public function owner(): string
            {
                return 'test-owner';
            }

            public function forceRelease(): void
            {
                //
            }
        });

    Cache::shouldReceive('put')->never();

    $connector = new class extends AthenaConnector
    {
        public int $accessTokenCalls = 0;

        public function getAccessToken(array $scopes = [], string $scopeSeparator = ' ', bool $returnResponse = false, ?callable $requestModifier = null): OAuthAuthenticator|Response
        {
            $this->accessTokenCalls++;

            throw new Exception('getAccessToken should not be called when a token exists inside the lock');
        }
    };

    expect($connector->accessTokenCalls)->toBe(0);
});

it('uses a 15 requests-per-second limiter outside production', function () {
    athenaTestConfig();
    cacheAthenaToken();

    $connector = new AthenaConnector;
    $limits = $connector->getLimits();

    $perSecondLimit = null;
    foreach ($limits as $limit) {
        if ($limit->getAllow() === 15 && $limit->getReleaseInSeconds() === 1) {
            $perSecondLimit = $limit;

            break;
        }
    }

    expect($perSecondLimit)->not->toBeNull()
        ->and($perSecondLimit->getAllow())->toBe(15)
        ->and($perSecondLimit->getReleaseInSeconds())->toBe(1)
        ->and($perSecondLimit->getShouldSleep())->toBeFalse();
});

it('uses a 150 requests-per-second limiter in production', function () {
    athenaTestConfig();
    cacheAthenaToken();

    $originalEnvironment = app('env');
    app()->instance('env', 'production');

    try {
        $connector = new AthenaConnector;
        $limits = $connector->getLimits();

        $perSecondLimit = null;
        foreach ($limits as $limit) {
            if ($limit->getAllow() === 150 && $limit->getReleaseInSeconds() === 1) {
                $perSecondLimit = $limit;

                break;
            }
        }

        expect($perSecondLimit)->not->toBeNull()
            ->and($perSecondLimit->getAllow())->toBe(150)
            ->and($perSecondLimit->getReleaseInSeconds())->toBe(1)
            ->and($perSecondLimit->getShouldSleep())->toBeFalse();
    } finally {
        app()->instance('env', $originalEnvironment);
    }
});
