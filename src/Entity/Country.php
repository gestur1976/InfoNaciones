<?php

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

    #[ORM\Column(length: 4, nullable: false, unique: true)]
    private string $cca2Id;

    #[ORM\Column(length: 4, nullable: false, unique: true)]
    private int $ccn3Id;

    #[ORM\Column(length: 4, nullable: false, unique: true)]
    private string $cca3Id;
 
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

    #[ORM\OneToMany(mappedBy: 'cca3_id', targetEntity: CountryNativeName::class, orphanRemoval: true)]
    private Collection $countryNativeNames;

    #[ORM\OneToMany(mappedBy: 'cca3_id', targetEntity: DomainSuffix::class, orphanRemoval: true)]
    private Collection $domainSuffixes;

    #[ORM\ManyToMany(targetEntity: Currency::class, inversedBy: 'countriesWithCurrency')]
    private Collection $currencies;

    #[ORM\Column(length: 4, nullable: true)]
    private ?string $cioc = null;

    #[ORM\OneToMany(mappedBy: 'cca3_id', targetEntity: CapitalCities::class, orphanRemoval: true)]
    private Collection $capitalCities;

    #[ORM\OneToMany(mappedBy: 'cca3_id', targetEntity: AltSpellings::class, orphanRemoval: true)]
    private Collection $altSpellings;

    #[ORM\ManyToMany(targetEntity: Languages::class, inversedBy: 'countries')]
    private Collection $languages;

    #[ORM\OneToMany(mappedBy: 'cca3_id', targetEntity: Translation::class, orphanRemoval: true)]
    private Collection $translations;
    
    #[ORM\OneToMany(mappedBy: 'cca3_id', targetEntity: Maps::class, orphanRemoval: true)]
    private Collection $maps;

    #[ORM\ManyToMany(targetEntity: Continent::class, inversedBy: 'countries')]
    private Collection $continents;

    #[ORM\OneToOne(mappedBy: 'cca3_id', cascade: ['persist', 'remove'])]
    private ?Flags $flags = null;

    #[ORM\OneToOne(mappedBy: 'cca3_id', cascade: ['persist', 'remove'])]
    private ?CoatOfArms $coatOfArms = null;

    #[ORM\Column]
    private ?string $startOfWeek = null;

    #[ORM\OneToMany(mappedBy: 'cca3_id', targetEntity: CountryBorder::class)]
    private Collection $countryBorders;

    public function __construct()
    {
        $this->countryNativeNames = new ArrayCollection();
        $this->domainSuffixes = new ArrayCollection();
        $this->currencies = new ArrayCollection();
        $this->capitalCities = new ArrayCollection();
        $this->altSpellings = new ArrayCollection();
        $this->languages = new ArrayCollection();
        $this->translations = new ArrayCollection();
        $this->maps = new ArrayCollection();
        $this->continents = new ArrayCollection();
        $this->countryBorders = new ArrayCollection();
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

    public function getFlagUTF8(): ?string
    {
        return $this->flag;
    }

    public function setFlagUTF8(string $flag): static
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

    /**
     * @return Collection<int, CountryNativeName>
     */
    public function getCountryNativeNames(): Collection
    {
        return $this->countryNativeNames;
    }

    public function addCountryNativeName(CountryNativeName $countryNativeName): static
    {
        if (!$this->countryNativeNames->contains($countryNativeName)) {
            $this->countryNativeNames->add($countryNativeName);
            $countryNativeName->setCca3($this);
        }

        return $this;
    }

    public function removeCountryNativeName(CountryNativeName $countryNativeName): static
    {
        if ($this->countryNativeNames->removeElement($countryNativeName)) {
            // set the owning side to null (unless already changed)
            if ($countryNativeName->getCca3() === $this) {
                $countryNativeName->setCca3(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DomainSuffix>
     */
    public function getDomainSuffixes(): Collection
    {
        return $this->domainSuffixes;
    }

    public function addDomainSuffix(DomainSuffix $domainSuffix): static
    {
        if (!$this->domainSuffixes->contains($domainSuffix)) {
            $this->domainSuffixes->add($domainSuffix);
            $domainSuffix->setCca3($this);
        }

        return $this;
    }

    public function removeDomainSuffix(DomainSuffix $domainSuffix): static
    {
        if ($this->domainSuffixes->removeElement($domainSuffix)) {
            // set the owning side to null (unless already changed)
            if ($domainSuffix->getCca3() === $this) {
                $domainSuffix->setCca3(null);
            }
        }

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
        }

        return $this;
    }

    public function removeCurrency(Currency $currency): static
    {
        $this->currencies->removeElement($currency);

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

    /**
     * @return Collection<int, CapitalCities>
     */
    public function getCapitalCities(): Collection
    {
        return $this->capitalCities;
    }

    public function addCapitalCity(CapitalCities $capitalCity): static
    {
        if (!$this->capitalCities->contains($capitalCity)) {
            $this->capitalCities->add($capitalCity);
            $capitalCity->setCca3($this);
        }

        return $this;
    }

    public function removeCapitalCity(CapitalCities $capitalCity): static
    {
        if ($this->capitalCities->removeElement($capitalCity)) {
            // set the owning side to null (unless already changed)
            if ($capitalCity->getCca3() === $this) {
                $capitalCity->setCca3(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AltSpellings>
     */
    public function getAltSpellings(): Collection
    {
        return $this->altSpellings;
    }

    public function addAltSpelling(AltSpellings $altSpelling): static
    {
        if (!$this->altSpellings->contains($altSpelling)) {
            $this->altSpellings->add($altSpelling);
            $altSpelling->setCca3($this);
        }

        return $this;
    }

    public function removeAltSpelling(AltSpellings $altSpelling): static
    {
        if ($this->altSpellings->removeElement($altSpelling)) {
            // set the owning side to null (unless already changed)
            if ($altSpelling->getCca3() === $this) {
                $altSpelling->setCca3(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Languages>
     */
    public function getLanguages(): Collection
    {
        return $this->languages;
    }

    public function addLanguage(Languages $language): static
    {
        if (!$this->languages->contains($language)) {
            $this->languages->add($language);
        }

        return $this;
    }

    public function removeLanguage(Languages $language): static
    {
        $this->languages->removeElement($language);

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
            $translation->setCca3($this);
        }

        return $this;
    }

    public function removeTranslation(Translation $translation): static
    {
        if ($this->translations->removeElement($translation)) {
            // set the owning side to null (unless already changed)
            if ($translation->getCca3() === $this) {
                $translation->setCca3(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Maps>
     */
    public function getMaps(): Collection
    {
        return $this->maps;
    }

    public function addMap(Maps $map): static
    {
        if (!$this->maps->contains($map)) {
            $this->maps->add($map);
            $map->setCca3($this);
        }

        return $this;
    }

    public function removeMap(Maps $map): static
    {
        if ($this->maps->removeElement($map)) {
            // set the owning side to null (unless already changed)
            if ($map->getCca3() === $this) {
                $map->setCca3(null);
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
        }

        return $this;
    }

    public function removeContinent(Continent $continent): static
    {
        $this->continents->removeElement($continent);

        return $this;
    }

    public function getFlags(): ?Flags
    {
        return $this->flags;
    }

    public function setFlags(Flags $flags): static
    {
        // set the owning side of the relation if necessary
        if ($flags->getCca3() !== $this) {
            $flags->setCca3($this);
        }

        $this->flags = $flags;

        return $this;
    }

    public function getCoatOfArms(): ?CoatOfArms
    {
        return $this->coatOfArms;
    }

    public function setCoatOfArms(CoatOfArms $coatOfArms): static
    {
        // set the owning side of the relation if necessary
        if ($coatOfArms->getCca3() !== $this) {
            $coatOfArms->setCca3($this);
        }

        $this->coatOfArms = $coatOfArms;

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
}
