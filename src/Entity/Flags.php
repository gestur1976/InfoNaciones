<?php

namespace App\Entity;

use App\Repository\FlagsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FlagsRepository::class)]
class Flags
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'flags', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Country $cca3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $png = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $svg = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $alt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCca3(): ?Country
    {
        return $this->cca3;
    }

    public function setCca3(Country $cca3): static
    {
        $this->cca3 = $cca3;

        return $this;
    }

    public function getPng(): ?string
    {
        return $this->png;
    }

    public function setPng(?string $png): static
    {
        $this->png = $png;

        return $this;
    }

    public function getSvg(): ?string
    {
        return $this->svg;
    }

    public function setSvg(?string $svg): static
    {
        $this->svg = $svg;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(?string $alt): static
    {
        $this->alt = $alt;

        return $this;
    }
}
