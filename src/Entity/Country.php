<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
#[ORM\Table(name: 'country', uniqueConstraints: [
    new ORM\UniqueConstraint(name: 'unique_cca2', columns: ['cca2']),
    new ORM\UniqueConstraint(name: 'unique_ccn3', columns: ['ccn3']),
    new ORM\UniqueConstraint(name: 'unique_cca3', columns: ['cca3'])
])]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 4, nullable: false, unique: true)]
    private string $cca2;

    #[ORM\Column(length: 4, nullable: false, unique: true)]
    private int $ccn3;

    #[ORM\Column(length: 4, nullable: false, unique: true)]
    private string $cca3;
 
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

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $population = null;

    #[ORM\Column(nullable: true)]
    private ?float $gini = null;

    #[ORM\Column(length: 4, nullable: true)]
    private ?string $fifa = null;

    #[ORM\Column(length: 255)]
    private ?string $commonName = null;

    #[ORM\Column(length: 255)]
    private ?string $officialName = null;

    #[ORM\OneToMany(mappedBy: 'cca3', targetEntity: CountryNativeName::class, orphanRemoval: true)]
    private Collection $countryNativeNames;

    #[ORM\OneToMany(mappedBy: 'cca3', targetEntity: DomainSuffix::class, orphanRemoval: true)]
    private Collection $domainSuffixes;

    #[ORM\ManyToMany(targetEntity: Currency::class, inversedBy: 'countriesWithCurrency')]
    private Collection $currencies;

    #[ORM\Column(length: 4, nullable: true)]
    private ?string $cioc = null;

    #[ORM\OneToMany(mappedBy: 'cca3', targetEntity: CapitalCities::class, orphanRemoval: true)]
    private Collection $capitalCities;

    #[ORM\OneToMany(mappedBy: 'cca3', targetEntity: AltSpellings::class, orphanRemoval: true)]
    private Collection $altSpellings;

    #[ORM\ManyToMany(targetEntity: Languages::class, inversedBy: 'countries')]
    private Collection $languages;

    public function __construct()
    {
        $this->countryNativeNames = new ArrayCollection();
        $this->domainSuffixes = new ArrayCollection();
        $this->currencies = new ArrayCollection();
        $this->capitalCities = new ArrayCollection();
        $this->altSpellings = new ArrayCollection();
        $this->languages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCca2(): string
    {
        return $this->cca2;
    }

    public function setCca2(string $cca2): static
    {
        $this->cca2 = $cca2;

        return $this;
    }

    public function getCcn3(): int
    {
        return $this->ccn3;
    }

    public function setCcn3(int $ccn3): static
    {
        $this->ccn3 = $ccn3;

        return $this;
    }

    public function getCca3(): string
    {
        return $this->cca3;
    }

    public function setCca3(string $cca3): static
    {
        $this->cca3 = $cca3;

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

    public function setFlag(?string $flag): static
    {
        $this->flag = $flag;

        return $this;
    }

    public function getPopulation(): ?string
    {
        return $this->population;
    }

    public function setPopulation(?string $population): static
    {
        $this->population = $population;

        return $this;
    }

    public function getGini(): ?float
    {
        return $this->gini;
    }

    public function setGini(?float $gini): static
    {
        $this->gini = $gini;

        return $this;
    }

    public function getFifa(): ?string
    {
        return $this->fifa;
    }

    public function setFifa(?string $fifa): static
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
}
