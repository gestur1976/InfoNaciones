<?php

namespace App\Entity;

use App\Repository\CapitalCitiesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapitalCitiesRepository::class)]
class CapitalCities
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'capitalCities')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Country $cca3 = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCca3(): ?Country
    {
        return $this->cca3;
    }

    public function setCca3(?Country $cca3): static
    {
        $this->cca3 = $cca3;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
