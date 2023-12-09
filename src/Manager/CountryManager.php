<?php

declare(strict_types=1);

namespace App\Manager;

use App\Entity\Country;
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
        $country = new Country();
        $country->setCommonName($restCountryData['name']['common']);
        $country->setOfficialName($restCountryData['name']['official']);
        $country->setTld($restCountryData['tld'][0]);
        $country->setCca2Id($restCountryData['cca2']);
        $country->setCcn3Id((int)$restCountryData['ccn3']);
        $country->setCca3Id($restCountryData['cca3']);
        $country->setCioc($restCountryData['cioc']);
        $country->setIndependent($restCountryData['independent']);
        $country->setStatus($restCountryData['status']);
        $country->setUnMember($restCountryData['unMember']);
        $country->setRegion($restCountryData['region']);
        $country->setSubregion($restCountryData['subregion']);
        $country->setLatitude((float)$restCountryData['latlng'][0]);
        $country->setLongitude((float)$restCountryData['latlng'][1]);
        $country->setLandlocked((bool)$restCountryData['landlocked']);
        $country->setArea((float)$restCountryData['area']);
        $country->setFlag($restCountryData['flag']);
        $country->setPopulation((int)$restCountryData['population']);
        $country->setGini((float)($restCountryData['gini'][\array_key_last($restCountryData['gini'])]?? 0));
        $country->setFifa($restCountryData['fifa']);
        $country->setTrafficDirection($restCountryData['car']['side']);
        $country->setFlagImage($restCountryData['flags']['png']);
        $country->setFlagVector($restCountryData['flags']['svg']);
        $country->setFlagAltText($restCountryData['flags']['alt']);
        $country->setCoatOfArmsImage($restCountryData['coatOfArms']['png']);
        $country->setCoatOfArmsVector($restCountryData['coatOfArms']['svg']);
        $country->setStartOfWeek($restCountryData['startOfWeek']);
        $country->setDateCreated(new \DateTimeImmutable());
        $country->setDateModified($country->getDateCreated());

        $this->entityManager->persist($country);
        $this->entityManager->flush();

        return $country;
    }
}