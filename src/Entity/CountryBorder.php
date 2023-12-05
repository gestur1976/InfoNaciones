<?php

namespace App\Entity;

use App\Repository\CountryBorderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryBorderRepository::class)]
class CountryBorder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: "cca3_id_one", referencedColumnName: "cca3_id")]
    private ?Country $firstCountry = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: "cca3_id_two", referencedColumnName: "cca3_id")]
    private ?Country $secondCountry = null;

    #[ORM\JoinColumn(nullable: false)]
    private ?Country $country = null;
    
    public function __construct(Country $firstCountry, Country $secondCountry)
    {
        $this->firstCountry = $firstCountry;
        $this->secondCountry = $secondCountry;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstCountry(): ?Country
    {
        return $this->firstCountry;
    }

    public function setFirstCountry(Country $firstCountry): static
    {
        $this->firstCountry = $firstCountry;

        return $this;
    }

    public function getSecondCountry(): ?Country
    {
        return $this->secondCountry;
    }

    public function setSecondCountry(Country $secondCountry): static
    {
        $this->secondCountry = $secondCountry;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): static
    {
        $this->country = $country;

        return $this;
    }
}
