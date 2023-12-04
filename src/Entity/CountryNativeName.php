<?php

namespace App\Entity;

use App\Repository\CountryNativeNameRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryNativeNameRepository::class)]
class CountryNativeName
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'countryNativeName')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Country $cca3 = null;

    #[ORM\Column(length: 4)]
    private ?string $langCode = null;

    #[ORM\Column(length: 255)]
    private ?string $official = null;

    #[ORM\Column(length: 255)]
    private ?string $common = null;

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

    public function getLangCode(): ?string
    {
        return $this->langCode;
    }

    public function setLangCode(string $langCode): static
    {
        $this->langCode = $langCode;

        return $this;
    }

    public function getOfficial(): ?string
    {
        return $this->official;
    }

    public function setOfficial(string $official): static
    {
        $this->official = $official;

        return $this;
    }

    public function getCommon(): ?string
    {
        return $this->common;
    }

    public function setCommon(string $common): static
    {
        $this->common = $common;

        return $this;
    }
}
