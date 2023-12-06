<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
#[ORM\Table(name: 'country', uniqueConstraints: [
    new ORM\UniqueConstraint(name: 'unique_cca2', columns: ['cca2_id']),
    new ORM\UniqueConstraint(name: 'unique_ccn3', columns: ['ccn3_id']),
    new ORM\UniqueConstraint(name: 'unique_cca3', columns: ['cca3_id'])
])]
class Country
{    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 4, nullable: true, unique: true)]
    private ?string $cca2Id;

    #[ORM\Column(length: 4, nullable: true, unique: true)]
    private ?int $ccn3Id;

    #[ORM\Column(length: 4, nullable: true, unique: true)]
    private ?string $cca3Id;
 
    #[ORM\Column(nullable: true)]
    private ?bool $independent = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(nullable: true)]
    private ?bool $unMember = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $region = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $subregion = null;

    #[ORM\Column(nullable: true)]
    private ?float $latitude = null;

    #[ORM\Column(nullable: true)]
    private ?float $longitude = null;

    #[ORM\Column(nullable: true)]
    private ?bool $landlocked = null;

    #[ORM\Column(nullable: true)]
    private ?float $area = null;

    #[ORM\Column(length: 16, nullable: true)]
    private ?string $flag = null;

    #[ORM\Column(nullable: true)]
    private ?int $population = null;

    #[ORM\Column(nullable: true)]
    private ?float $gini = null;

    #[ORM\Column(length: 4, nullable: true)]
    private ?string $fifa = null;

    #[ORM\Column(length: 255)]
    private ?string $commonName = null;

    #[ORM\Column(length: 255)]
    private ?string $officialName = null;

    #[ORM\Column(length: 4, nullable: true)]
    private ?string $cioc = null;

    #[ORM\Column]
    private ?string $startOfWeek = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $trafficDirection = null;

    #[ORM\Column(length: 255)]
    private ?string $flagImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $flagVector = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coatOfArmsImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coatOfArmsVector = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nativeCommonName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nativeOfficialName = null;

    #[ORM\Column(length: 64, nullable: true)]
    private ?string $tld = null;

    #[ORM\ManyToMany(targetEntity: Currency::class, mappedBy: 'countries')]
    private Collection $currencies;

    #[ORM\OneToMany(mappedBy: 'country', targetEntity: CountryBorder::class, orphanRemoval: true)]
    private Collection $countryBorders;

    #[ORM\ManyToMany(targetEntity: Continent::class, mappedBy: 'countries')]
    private Collection $continents;

    #[ORM\OneToMany(mappedBy: 'country', targetEntity: AltSpelling::class, orphanRemoval: true)]
    private Collection $altSpellings;

    #[ORM\ManyToMany(targetEntity: Language::class, mappedBy: 'countries')]
    private Collection $languages;

    #[ORM\OneToMany(mappedBy: 'country', targetEntity: CapitalCity::class, orphanRemoval: true)]
    private Collection $capitalCities;

    #[ORM\OneToMany(mappedBy: 'country', targetEntity: Translation::class, orphanRemoval: true)]
    private Collection $translations;

    #[ORM\OneToMany(mappedBy: 'country', targetEntity: Map::class, orphanRemoval: true)]
    private Collection $maps;

    #[ORM\OneToMany(mappedBy: 'country', targetEntity: TimeZone::class, orphanRemoval: true)]
    private Collection $timeZones;

    #[ORM\ManyToOne(inversedBy: 'countries')]
    private ?User $createdBy = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreated = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateModified = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDeleted = null;

    public function __construct()
    {
        $this->currencies = new ArrayCollection();
        $this->countryBorders = new ArrayCollection();
        $this->continents = new ArrayCollection();
        $this->altSpellings = new ArrayCollection();
        $this->languages = new ArrayCollection();
        $this->capitalCities = new ArrayCollection();
        $this->translations = new ArrayCollection();
        $this->maps = new ArrayCollection();
        $this->timeZones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCca2Id(): string
    {
        return $this->cca2Id;
    }

    public function setCca2Id(string $cca2Id): static
    {
        $this->cca2Id = $cca2Id;

        return $this;
    }

    public function getCcn3Id(): int
    {
        return $this->ccn3Id;
    }

    public function setCcn3Id(int $ccn3Id): static
    {
        $this->ccn3Id = $ccn3Id;

        return $this;
    }

    public function getCca3Id(): string
    {
        return $this->cca3Id;
    }

    public function setCca3Id(string $cca3Id): static
    {
        $this->cca3Id = $cca3Id;

        return $this;
    }

    public function isIndependent(): ?bool
    {
        return $this->independent;
    }

    public function setIndependent(?bool $independent): static
    {
        $this->independent = $independent;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function isUnMember(): ?bool
    {
        return $this->unMember;
    }

    public function setUnMember(?bool $unMember): static
    {
        $this->unMember = $unMember;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getSubregion(): ?string
    {
        return $this->subregion;
    }

    public function setSubregion(?string $subregion): static
    {
        $this->subregion = $subregion;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function isLandlocked(): ?bool
    {
        return $this->landlocked;
    }

    public function setLandlocked(?bool $landlocked): static
    {
        $this->landlocked = $landlocked;

        return $this;
    }

    public function getArea(): ?float
    {
        return $this->area;
    }

    public function setArea(?float $area): static
    {
        $this->area = $area;

        return $this;
    }

    public function getFlag(): ?string
    {
        return $this->flag;
    }

    public function setFlag(string $flag): static
    {
        $this->flag = $flag;

        return $this;
    }

    public function getPopulation(): ?int
    {
        return $this->population;
    }

    public function setPopulation(int $population): static
    {
        $this->population = $population;

        return $this;
    }

    public function getGini(): ?float
    {
        return $this->gini;
    }

    public function setGini(float $gini): static
    {
        $this->gini = $gini;

        return $this;
    }

    public function getFifa(): ?string
    {
        return $this->fifa;
    }

    public function setFifa(string $fifa): static
    {
        $this->fifa = $fifa;

        return $this;
    }

    public function getCommonName(): ?string
    {
        return $this->commonName;
    }

    public function setCommonName(string $commonName): static
    {
        $this->commonName = $commonName;

        return $this;
    }

    public function getOfficialName(): ?string
    {
        return $this->officialName;
    }

    public function setOfficialName(string $officialName): static
    {
        $this->officialName = $officialName;

        return $this;
    }

    public function getCioc(): ?string
    {
        return $this->cioc;
    }

    public function setCioc(?string $cioc): static
    {
        $this->cioc = $cioc;

        return $this;
    }

    public function getStartOfWeek(): string
    {
        return $this->startOfWeek;
    }

    public function setStartOfWeek(string $startOfWeek): static
    {
       $this->startOfWeek = $startOfWeek;

       return $this;
    }

    public function getTrafficDirection(): ?string
    {
        return $this->trafficDirection;
    }

    public function setTrafficDirection(?string $trafficDirection): static
    {
        $this->trafficDirection = $trafficDirection;

        return $this;
    }

    public function getFlagImage(): ?string
    {
        return $this->flagImage;
    }

    public function setFlagImage(string $flagImage): static
    {
        $this->flagImage = $flagImage;

        return $this;
    }

    public function getFlagVector(): ?string
    {
        return $this->flagVector;
    }

    public function setFlagVector(?string $flagVector): static
    {
        $this->flagVector = $flagVector;

        return $this;
    }

    public function getCoatOfArmsImage(): ?string
    {
        return $this->coatOfArmsImage;
    }

    public function setCoatOfArmsImage(?string $coatOfArmsImage): static
    {
        $this->coatOfArmsImage = $coatOfArmsImage;

        return $this;
    }

    public function getCoatOfArmsVector(): ?string
    {
        return $this->coatOfArmsVector;
    }

    public function setCoatOfArmsVector(?string $coatOfArmsVector): static
    {
        $this->coatOfArmsVector = $coatOfArmsVector;

        return $this;
    }

    public function getNativeCommonName(): ?string
    {
        return $this->nativeCommonName;
    }

    public function setNativeCommonName(?string $nativeCommonName): static
    {
        $this->nativeCommonName = $nativeCommonName;

        return $this;
    }

    public function getNativeOfficialName(): ?string
    {
        return $this->nativeOfficialName;
    }

    public function setNativeOfficialName(?string $nativeOfficialName): static
    {
        $this->nativeOfficialName = $nativeOfficialName;

        return $this;
    }

    public function getTld(): ?string
    {
        return $this->tld;
    }

    public function setTld(?string $tld): static
    {
        $this->tld = $tld;

        return $this;
    }

    /**
     * @return Collection<int, Currency>
     */
    public function getCurrencies(): Collection
    {
        return $this->currencies;
    }

    public function addCurrency(Currency $currency): static
    {
        if (!$this->currencies->contains($currency)) {
            $this->currencies->add($currency);
            $currency->addCountry($this);
        }

        return $this;
    }

    public function removeCurrency(Currency $currency): static
    {
        if ($this->currencies->removeElement($currency)) {
            $currency->removeCountry($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, CountryBorder>
     */
    public function getCountryBorders(): Collection
    {
        return $this->countryBorders;
    }

    public function addCountryBorder(CountryBorder $countryBorder): static
    {
        if (!$this->countryBorders->contains($countryBorder)) {
            $this->countryBorders->add($countryBorder);
            $countryBorder->setCountry($this);
        }

        return $this;
    }

    public function removeCountryBorder(CountryBorder $countryBorder): static
    {
        if ($this->countryBorders->removeElement($countryBorder)) {
            // set the owning side to null (unless already changed)
            if ($countryBorder->getCountry() === $this) {
                $countryBorder->setCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Continent>
     */
    public function getContinents(): Collection
    {
        return $this->continents;
    }

    public function addContinent(Continent $continent): static
    {
        if (!$this->continents->contains($continent)) {
            $this->continents->add($continent);
            $continent->addCountry($this);
        }

        return $this;
    }

    public function removeContinent(Continent $continent): static
    {
        if ($this->continents->removeElement($continent)) {
            $continent->removeCountry($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, AltSpelling>
     */
    public function getAltSpellings(): Collection
    {
        return $this->altSpellings;
    }

    public function addAltSpelling(AltSpelling $altSpelling): static
    {
        if (!$this->altSpellings->contains($altSpelling)) {
            $this->altSpellings->add($altSpelling);
            $altSpelling->setCountry($this);
        }

        return $this;
    }

    public function removeAltSpelling(AltSpelling $altSpelling): static
    {
        if ($this->altSpellings->removeElement($altSpelling)) {
            // set the owning side to null (unless already changed)
            if ($altSpelling->getCountry() === $this) {
                $altSpelling->setCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Language>
     */
    public function getLanguages(): Collection
    {
        return $this->languages;
    }

    public function addLanguage(Language $language): static
    {
        if (!$this->languages->contains($language)) {
            $this->languages->add($language);
            $language->addCountry($this);
        }

        return $this;
    }

    public function removeLanguage(Language $language): static
    {
        if ($this->languages->removeElement($language)) {
            $language->removeCountry($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, CapitalCity>
     */
    public function getCapitalCities(): Collection
    {
        return $this->capitalCities;
    }

    public function addCapitalCity(CapitalCity $capitalCity): static
    {
        if (!$this->capitalCities->contains($capitalCity)) {
            $this->capitalCities->add($capitalCity);
            $capitalCity->setCountry($this);
        }

        return $this;
    }

    public function removeCapitalCity(CapitalCity $capitalCity): static
    {
        if ($this->capitalCities->removeElement($capitalCity)) {
            // set the owning side to null (unless already changed)
            if ($capitalCity->getCountry() === $this) {
                $capitalCity->setCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Translation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(Translation $translation): static
    {
        if (!$this->translations->contains($translation)) {
            $this->translations->add($translation);
            $translation->setCountry($this);
        }

        return $this;
    }

    public function removeTranslation(Translation $translation): static
    {
        if ($this->translations->removeElement($translation)) {
            // set the owning side to null (unless already changed)
            if ($translation->getCountry() === $this) {
                $translation->setCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Map>
     */
    public function getMaps(): Collection
    {
        return $this->maps;
    }

    public function addMap(Map $map): static
    {
        if (!$this->maps->contains($map)) {
            $this->maps->add($map);
            $map->setCountry($this);
        }

        return $this;
    }

    public function removeMap(Map $map): static
    {
        if ($this->maps->removeElement($map)) {
            // set the owning side to null (unless already changed)
            if ($map->getCountry() === $this) {
                $map->setCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TimeZone>
     */
    public function getTimeZones(): Collection
    {
        return $this->timeZones;
    }

    public function addTimeZone(TimeZone $timeZone): static
    {
        if (!$this->timeZones->contains($timeZone)) {
            $this->timeZones->add($timeZone);
            $timeZone->setCountry($this);
        }

        return $this;
    }

    public function removeTimeZone(TimeZone $timeZone): static
    {
        if ($this->timeZones->removeElement($timeZone)) {
            // set the owning side to null (unless already changed)
            if ($timeZone->getCountry() === $this) {
                $timeZone->setCountry(null);
            }
        }

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): static
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): static
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getDateModified(): ?\DateTimeInterface
    {
        return $this->dateModified;
    }

    public function setDateModified(\DateTimeInterface $dateModified): static
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    public function getDateDeleted(): ?\DateTimeInterface
    {
        return $this->dateDeleted;
    }

    public function setDateDeleted(?\DateTimeInterface $dateDeleted): static
    {
        $this->dateDeleted = $dateDeleted;

        return $this;
    }
}
