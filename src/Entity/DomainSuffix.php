<?php

namespace App\Entity;

use App\Repository\DomainSuffixRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DomainSuffixRepository::class)]
class DomainSuffix
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'domainSuffixes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Country $cca3 = null;

    #[ORM\Column(length: 30)]
    private ?string $domainSuffix = null;

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

    public function getDomainSuffix(): ?string
    {
        return $this->domainSuffix;
    }

    public function setDomainSuffix(string $domainSuffix): static
    {
        $this->domainSuffix = $domainSuffix;

        return $this;
    }
}
