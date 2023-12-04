<?php

namespace App\Entity;

use App\Repository\CurrencyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CurrencyRepository::class)]
class Currency
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 4)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $currencyName = null;

    #[ORM\Column(length: 4)]
    private ?string $symbol = null;

    #[ORM\ManyToMany(targetEntity: Country::class, mappedBy: 'currencies')]
    private Collection $countriesWithCurrency;

    public function __construct()
    {
        $this->countriesWithCurrency = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getCurrencyName(): ?string
    {
        return $this->currencyName;
    }

    public function setCurrencyName(string $currencyName): static
    {
        $this->currencyName = $currencyName;

        return $this;
    }

    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): static
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * @return Collection<int, Country>
     */
    public function getCountriesWithCurrency(): Collection
    {
        return $this->countriesWithCurrency;
    }

    public function addCountriesWithCurrency(Country $countriesWithCurrency): static
    {
        if (!$this->countriesWithCurrency->contains($countriesWithCurrency)) {
            $this->countriesWithCurrency->add($countriesWithCurrency);
            $countriesWithCurrency->addCurrency($this);
        }

        return $this;
    }

    public function removeCountriesWithCurrency(Country $countriesWithCurrency): static
    {
        if ($this->countriesWithCurrency->removeElement($countriesWithCurrency)) {
            $countriesWithCurrency->removeCurrency($this);
        }

        return $this;
    }
}
