<?php

namespace App\Entity;

use App\Enum\Ruolo;
use App\Repository\NucleoFamiliareRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NucleoFamiliareRepository::class)]
class NucleoFamiliare
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "ruolo_enum", length: 20)]
    private $ruolo;

    #[ORM\ManyToOne(inversedBy: 'membri')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Famiglia $famiglia = null;

    #[ORM\ManyToOne(inversedBy: 'membri')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cittadino $cittadino = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRuolo(): ?Ruolo
    {
        return $this->ruolo;
    }

    public function setRuolo(Ruolo $ruolo): self
    {
        // Salva il valore dell'enum come stringa nel database
        $this->ruolo = $ruolo;

        return $this;
    }

    public function getFamiglia(): ?Famiglia
    {
        return $this->famiglia;
    }

    public function setFamiglia(?Famiglia $famiglia): static
    {
        $this->famiglia = $famiglia;

        return $this;
    }

    public function getCittadino(): ?Cittadino
    {
        return $this->cittadino;
    }

    public function setCittadino(?Cittadino $cittadino): static
    {
        $this->cittadino = $cittadino;

        return $this;
    }
}
