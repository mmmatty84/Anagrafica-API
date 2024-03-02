<?php

namespace App\Entity;

use App\Repository\FamigliaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FamigliaRepository::class)]
class Famiglia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nome = null;

    #[ORM\OneToMany(targetEntity: NucleoFamiliare::class, mappedBy: 'famiglia', orphanRemoval: true)]
    private Collection $membri;

    #[ORM\ManyToOne]
    private ?Cittadino $responsabile = null;



    public function __construct()
    {
        $this->membri = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * @return Collection<int, NucleoFamiliare>
     */
    public function getMembri(): Collection
    {
        return $this->membri;
    }

    public function addMembri(NucleoFamiliare $nucleoFamiliare): static
    {
        if (!$this->membri->contains($nucleoFamiliare)) {
            $this->membri->add($nucleoFamiliare);
            $nucleoFamiliare->setFamiglia($this);
        }

        return $this;
    }

    public function removeMembri(NucleoFamiliare $nucleoFamiliare): static
    {
        if ($this->membri->removeElement($nucleoFamiliare)) {
            // set the owning side to null (unless already changed)
            if ($nucleoFamiliare->getFamiglia() === $this) {
                $nucleoFamiliare->setFamiglia(null);
            }
        }

        return $this;
    }

    public function getResponsabile(): ?Cittadino
    {
        return $this->responsabile;
    }

    public function setResponsabile(?Cittadino $responsabile): static
    {
        $this->responsabile = $responsabile;

        return $this;
    }


}
