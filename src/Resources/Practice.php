<?php

namespace ChrisReedIO\AthenaSDK\Resources;

use ChrisReedIO\AthenaSDK\Data\Practice\EthnicityData;
use ChrisReedIO\AthenaSDK\Data\Practice\LanguageData;
use ChrisReedIO\AthenaSDK\Data\Practice\RaceData;
use ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\EthnicitiesReference\ListEthnicities;
use ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\LanguagesReference\ListLanguages;
use ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\RacesReference\ListRaces;
use ChrisReedIO\AthenaSDK\Resource;
use Illuminate\Support\Collection;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class Practice extends Resource
{
    /**
     * @return Collection<LanguageData>
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function languages(): Collection
    {
        return $this->connector->send(new ListLanguages)->dtoOrFail();
    }

    /**
     * @return Collection<RaceData>
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function races(): Collection
    {
        return $this->connector->send(new ListRaces)->dtoOrFail();
    }

    /**
     * @return Collection<EthnicityData>
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function ethnicities(): Collection
    {
        return $this->connector->send(new ListEthnicities)->dtoOrFail();
    }
}
