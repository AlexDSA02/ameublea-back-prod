<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MeubleGroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MeubleGroupeRepository::class)
 */
class MeubleGroupe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_meuble;

    /**
     * @ORM\OneToMany(targetEntity=MeubleUnique::class, mappedBy="meuble_groupe")
     */
    private $meubleUniques;

    /**
     * @ORM\ManyToMany(targetEntity=Ambiance::class, mappedBy="meuble_groupe")
     */
    private $ambiances;

    public function __construct()
    {
        $this->meubleUniques = new ArrayCollection();
        $this->ambiances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMeuble(): ?string
    {
        return $this->nom_meuble;
    }

    public function setNomMeuble(string $nom_meuble): self
    {
        $this->nom_meuble = $nom_meuble;

        return $this;
    }

    /**
     * @return Collection|MeubleUnique[]
     */
    public function getMeubleUniques(): Collection
    {
        return $this->meubleUniques;
    }

    public function addMeubleUnique(MeubleUnique $meubleUnique): self
    {
        if (!$this->meubleUniques->contains($meubleUnique)) {
            $this->meubleUniques[] = $meubleUnique;
            $meubleUnique->setMeubleGroupe($this);
        }

        return $this;
    }

    public function removeMeubleUnique(MeubleUnique $meubleUnique): self
    {
        if ($this->meubleUniques->contains($meubleUnique)) {
            $this->meubleUniques->removeElement($meubleUnique);
            // set the owning side to null (unless already changed)
            if ($meubleUnique->getMeubleGroupe() === $this) {
                $meubleUnique->setMeubleGroupe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ambiance[]
     */
    public function getAmbiances(): Collection
    {
        return $this->ambiances;
    }

    public function addAmbiance(Ambiance $ambiance): self
    {
        if (!$this->ambiances->contains($ambiance)) {
            $this->ambiances[] = $ambiance;
            $ambiance->addMeubleGroupe($this);
        }

        return $this;
    }

    public function removeAmbiance(Ambiance $ambiance): self
    {
        if ($this->ambiances->contains($ambiance)) {
            $this->ambiances->removeElement($ambiance);
            $ambiance->removeMeubleGroupe($this);
        }

        return $this;
    }
}
