<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TimeZoneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimeZoneRepository::class)]
class TimeZone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $UTCOffset = null;

    #[ORM\ManyToOne(inversedBy: 'timeZones')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Country $country = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUTCOffset(): ?string
    {
        return $this->UTCOffset;
    }

    public function setUTCOffset(string $UTCOffset): static
    {
        $this->UTCOffset = $UTCOffset;

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
