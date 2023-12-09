<?php

declare(strict_types=1);

namespace App\Manager;

use App\Entity\AltSpelling;
use App\Entity\CapitalCity;
use App\Entity\Continent;
use App\Entity\Country;
use App\Entity\CountryBorder;
use App\Entity\Currency;
use App\Entity\Language;
use App\Entity\Map;
use App\Entity\TimeZone;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

class CountryManager
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function newCountryFromRestCountryData(array $restCountryData): ?Country
    {
        if (empty($restCountryData)) {
            return null;
        }

        // Fill country entity with data from REST API
        $country = new Country();
        $country->setCommonName($restCountryData['name']['common']);
        $country->setOfficialName($restCountryData['name']['official']);
        $country->setTld($restCountryData['tld'][0] ?? null);
        $country->setCca2Id($restCountryData['cca2']);
        $country->setCcn3Id(isset($restCountryData['ccn3']) ? (int) $restCountryData['ccn3'] : null);
        $country->setCca3Id($restCountryData['cca3']);
        $country->setCioc($restCountryData['cioc'] ?? null);
        $country->setIndependent($restCountryData['independent'] ?? null);
        $country->setStatus($restCountryData['status'] ?? null);
        $country->setUnMember($restCountryData['unMember'] ?? null);
        $country->setRegion($restCountryData['region'] ?? null);
        $country->setSubregion($restCountryData['subregion'] ?? null);
        $country->setLatitude(isset($restCountryData['latlng'][0]) ? (float) $restCountryData['latlng'][0] : null);
        $country->setLongitude(isset($restCountryData['latlng'][1]) ? (float) $restCountryData['latlng'][1] : null);
        $country->setLandlocked(isset($restCountryData['landlocked']) ? (bool) $restCountryData['landlocked'] : null);
        $country->setArea(isset($restCountryData['area']) ? (float) $restCountryData['area'] : null);
        $country->setFlag($restCountryData['flag'] ?? null);
        $country->setPopulation(isset($restCountryData['population']) ? (int) $restCountryData['population'] : null);
        $country->setGini(isset($restCountryData['gini']) ? (float)($restCountryData['gini'][\array_key_last($restCountryData['gini'])]?? 0) : null);
        $country->setFifa($restCountryData['fifa'] ?? null);
        $country->setTrafficDirection($restCountryData['car']['side'] ?? null);
        $country->setFlagImage($restCountryData['flags']['png'] ?? null);
        $country->setFlagVector($restCountryData['flags']['svg'] ?? null);
        $country->setFlagAltText($restCountryData['flags']['alt'] ?? null);
        $country->setCoatOfArmsImage($restCountryData['coatOfArms']['png'] ?? null);
        $country->setCoatOfArmsVector($restCountryData['coatOfArms']['svg'] ?? null);
        $country->setStartOfWeek($restCountryData['startOfWeek'] ?? null);
        $country->setTrafficDirection($restCountryData['car']['side']?? null);
        $country->setDateCreated(new \DateTimeImmutable());
        $country->setDateModified($country->getDateCreated());
        $this->entityManager->persist($country);

        // Create/find and relate the rest of entities

        // Currencies
        $currencyRepository = $this->entityManager->getRepository(Currency::class);
        $importedCurrencies = $restCountryData['currencies'] ?? [];
        foreach ($importedCurrencies as $currencyCode => $currencyData) {
            $currency = $currencyRepository->findOneBy(['currencyCode' => $currencyCode]);
            if (!$currency) {
                $currency = new Currency();
                $currency->setCode($currencyCode);
                $currency->setCurrencyName($currencyData['name']);
                $currency->setSymbol($currencyData['symbol'] ?? null);
            }
            $currency->addCountry($country);
            $this->entityManager->persist($currency);
        }

        // Capitals
        $importedCapitalCityNames = $restCountryData['capital'] ?? [];
        foreach ($importedCapitalCityNames as $importedCapitalCityName) {
            $capitalCity = new CapitalCity();
            $capitalCity->setName($importedCapitalCityName);
            $capitalCity->setCountry($country);
            $this->entityManager->persist($capitalCity);
        }

        // Alternative spellings
        $importedAltSpellings = $restCountryData['altSpellings'] ?? [];
        foreach ($importedAltSpellings as $importedAltSpelling) {
            $altSpelling = new AltSpelling();
            $altSpelling->setName($importedAltSpelling);
            $altSpelling->setCountry($country);
            $this->entityManager->persist($altSpelling);
        }

        // Spoken languages
        $languageRepository = $this->entityManager->getRepository(Language::class);
        $importedLanguages = $restCountryData['languages']?? [];
        foreach ($importedLanguages as $languageCode => $languageName) {
            $language = $languageRepository->findOneBy(['code' => $languageCode]);
            if (!$language) {
                $language = new Language();
                $language->setCode($languageCode);
                $language->setName($languageName);
            }
            $language->addCountry($country);
            $this->entityManager->persist($language);
        }

        // Map providers
        $importedMaps = $restCountryData['maps']?? [];
        foreach ($importedMaps as $mapProvider => $mapURL) {
            $map = new Map();
            $map->setProvider($mapProvider);
            $map->setUrl($mapURL);
            $map->setCountry($country);
            $this->entityManager->persist($map);
        }

        // Time Zones
        $timeZoneRepository = $this->entityManager->getRepository(TimeZone::class);
        $importedTimeZones = $restCountryData['timezones']?? [];
        foreach ($importedTimeZones as $importedTimeZone) {
            $timeZone = $timeZoneRepository->findOneBy(['UTCOffset' => $importedTimeZone]);
            if (!$timeZone) {
                $timeZone = new TimeZone();
                $timeZone->setUTCOffset($importedTimeZone);
                $timeZone->setCountry($country);
            }
            $this->entityManager->persist($timeZone);
        }

        // Continents
        $continentRepository = $this->entityManager->getRepository(Continent::class);
        $importedContinents = $restCountryData['continents']?? [];
        foreach ($importedContinents as $importedContinent) {
            $continent = $continentRepository->findOneBy(['name' => $importedContinent]);
            if (!$continent) {
                $continent = new Continent();
                $continent->setName($importedContinent);
                $continent->addCountry($country);
            }
            $this->entityManager->persist($continent);
        }

        // Border countries
        $importedBorderCountries = $restCountryData['borders']?? [];
        foreach ($importedBorderCountries as $importedBorderCountry) {
            $countryBorder = new CountryBorder();
            $countryBorder->setForeignCountryCca3($importedBorderCountry);
            $countryBorder->setCountry($country);
            $this->entityManager->persist($countryBorder);
        }

        // Flush entities to database and return the newly created country
        $this->entityManager->flush();

        return $country;
    }
}