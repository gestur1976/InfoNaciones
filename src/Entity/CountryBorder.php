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

    #[ORM\ManyToOne(inversedBy: 'countryBorders')]
    #[ORM\JoinColumn(nullable: false)]
    private ?country $country = null;

    #[ORM\Column(length: 4)]
    private ?string $foreignCountryCca3 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?country
    {
        return $this->country;
    }

    public function setCountry(?country $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getForeignCountryCca3(): ?string
    {
        return $this->foreignCountryCca3;
    }

    public function setForeignCountryCca3(string $foreignCountryCca3): static
    {
        $this->foreignCountryCca3 = $foreignCountryCca3;

        return $this;
    }
}
