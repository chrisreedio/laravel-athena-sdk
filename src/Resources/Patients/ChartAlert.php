<?php

namespace ChrisReedIO\AthenaSDK\Resources\Patients;

use ChrisReedIO\AthenaSDK\AthenaConnector;
use ChrisReedIO\AthenaSDK\Data\Patient\ChartAlertData;
use ChrisReedIO\AthenaSDK\Requests\Patient\ChartAlert\CreatePatientChartAlert;
use ChrisReedIO\AthenaSDK\Requests\Patient\ChartAlert\DeletePatientChartAlert;
use ChrisReedIO\AthenaSDK\Requests\Patient\ChartAlert\GetPatientChartAlert;
use ChrisReedIO\AthenaSDK\Requests\Patient\ChartAlert\UpdatePatientChartAlert;
use ChrisReedIO\AthenaSDK\Resource;
use JsonException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class ChartAlert extends Resource
{
    public function __construct(
        protected AthenaConnector $connector,
        protected int $patientId,
        protected int $departmentId
    ) {
        parent::__construct($connector);
    }

    /**
     * Create new department specific patient's chart-alert
     *
     * @throws FatalRequestException
     * @throws JsonException
     * @throws RequestException
     */
    public function create(string $note): bool
    {
        $response = $this->connector->send(new CreatePatientChartAlert($this->patientId, $note, $this->departmentId));
        if ($response->failed()) {
            return false;
        }

        return $response->json('success') === true;
    }

    /**
     * Get last modified information of patient's chart specific to a department
     *
     * @throws FatalRequestException
     * @throws JsonException
     * @throws RequestException
     */
    public function get(): ?ChartAlertData
    {
        return $this->connector->send(new GetPatientChartAlert($this->patientId, $this->departmentId))->dtoOrFail();
    }

    /**
     * Update department specific patient's chart-alert
     *
     * @throws FatalRequestException
     * @throws JsonException
     * @throws RequestException
     */
    public function update(string $note): bool
    {
        $response = $this->connector->send(new UpdatePatientChartAlert($this->patientId, $note, $this->departmentId));
        if ($response->failed()) {
            return false;
        }

        return $response->json('success') === true;
    }

    /**
     * Delete department specific alerts for patient's chart changes
     *
     * @throws FatalRequestException
     * @throws JsonException
     * @throws RequestException
     */
    public function delete(): bool
    {
        $response = $this->connector->send(new DeletePatientChartAlert($this->patientId, $this->departmentId));
        if ($response->failed()) {
            return false;
        }

        return $response->json('success') === true;
    }
}
