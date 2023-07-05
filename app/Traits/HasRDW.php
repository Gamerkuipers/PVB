<?php

namespace App\Traits;

use allejo\Socrata\Exceptions\InvalidResourceException;
use allejo\Socrata\SodaClient;
use allejo\Socrata\SodaDataset;

trait HasRDW
{
    protected string $apiUrl = 'opendata.rdw.nl';

    protected string $apiDatasetLicenseName = 'm9d7-ebf2';

    protected string $apiDatasetFuelName = 'm9d7-ebf2';

    protected SodaClient $apiClient;

    protected SodaDataset $apiLicenseDataset;

    protected SodaDataset $apiFuelDataset;


    public function __construct()
    {
        $this->apiClient = new SodaClient($this->apiUrl, 'ggLCAzeK2b7XNUk248iYNuHTr');
        $this->apiLicenseDataset = new SodaDataset($this->apiClient, $this->apiDatasetLicenseName);
        $this->apiFuelDataset = new SodaDataset($this->apiClient, $this->apiDatasetFuelName);
    }

    /**
     * Replace '-' or ' ' or '_' with '' in the license plate
     */
    protected function getLicensePlate(string &$licensePlate): void
    {
        $licensePlate  = preg_replace('/[- _]/', '', $licensePlate);
    }

    public function getDataOnLicensePlate(string $licensePlate): array|null
    {
        $this->getLicensePlate($licensePlate);

        return $this->executeGetData($this->apiLicenseDataset, "kenteken={$licensePlate}");
    }

    public function getFuelTypeOfLicensePlate(string $licensePlate): array|null
    {
        $this->getLicensePlate($licensePlate);

        $fuel = $this->executeGetData($this->apiFuelDataset,"kenteken={$licensePlate}");

        return $fuel[0] ?? null;
    }

    protected function executeGetData(SodaDataset $dataset, string $filterOrQuery = ''): array|null
    {
        try {
            return $dataset->getData($filterOrQuery);
        } catch (\Exception $exception) {
            return null;
        }
    }
}
