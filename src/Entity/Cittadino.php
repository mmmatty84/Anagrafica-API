<?php

namespace App\Entity;

use App\Repository\CittadinoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CittadinoRepository::class)]
class Cittadino
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 255)]
    private ?string $cognome = null;

    #[ORM\Column(length: 16)]
    #[Assert\Unique]
    private ?string $codiceFiscale = null;

    #[ORM\OneToMany(targetEntity: NucleoFamiliare::class, mappedBy: 'cittadino', orphanRemoval: true)]
    private Collection $membri;

    #[ORM\OneToMany(targetEntity: Famiglia::class, mappedBy: 'responsabile')]
    private Collection $responsabileFamiglie;


    public function __construct()
    {
        $this->membri = new ArrayCollection();
        $this->responsabileFamiglie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCognome(): ?string
    {
        return $this->cognome;
    }

    public function setCognome(string $cognome): static
    {
        $this->cognome = $cognome;

        return $this;
    }

    public function getCodiceFiscale(): ?string
    {
        return $this->codiceFiscale;
    }

    public function setCodiceFiscale(string $codiceFiscale): static
    {
        $this->codiceFiscale = $codiceFiscale;

        return $this;
    }

    /**
     * @return Collection<int, NucleoFamiliare>
     */
    public function getMembri(): Collection
    {
        return $this->membri;
    }

    public function addNucleoFamiliare(NucleoFamiliare $nucleoFamiliare): static
    {
        if (!$this->membri->contains($nucleoFamiliare)) {
            $this->membri->add($nucleoFamiliare);
            $nucleoFamiliare->setCittadino($this);
        }

        return $this;
    }

    public function removeNucleoFamiliare(NucleoFamiliare $nucleoFamiliare): static
    {
        if ($this->membri->removeElement($nucleoFamiliare)) {
            // set the owning side to null (unless already changed)
            if ($nucleoFamiliare->getCittadino() === $this) {
                $nucleoFamiliare->setCittadino(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Famiglia>
     */
    public function getResponsabileFamiglie(): Collection
    {
        return $this->responsabileFamiglie;
    }

    public function addResponsabileFamiglie(Famiglia $famiglia): static
    {
        if (!$this->responsabileFamiglie->contains($famiglia)) {
            $this->responsabileFamiglie->add($famiglia);
            $famiglia->setResponsabile($this);
        }

        return $this;
    }

    public function removeResponsabileFamiglie(Famiglia $famiglia): static
    {
        if ($this->responsabileFamiglie->removeElement($famiglia)) {
            // set the owning side to null (unless already changed)
            if ($famiglia->getResponsabile() === $this) {
                $famiglia->setResponsabile(null);
            }
        }

        return $this;
    }
    
}
