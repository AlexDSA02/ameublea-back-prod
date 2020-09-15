<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AmbianceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AmbianceRepository::class)
 */
class Ambiance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix_ambiance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_ambiance;

    /**
     * @ORM\ManyToMany(targetEntity=meubleGroupe::class, inversedBy="ambiances")
     */
    private $meuble_groupe;

    /**
     * @ORM\OneToMany(targetEntity=Devis::class, mappedBy="ambiance")
     */
    private $devis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link_picture;


    public function __construct()
    {
        $this->meuble_groupe = new ArrayCollection();
        $this->devis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixAmbiance(): ?int
    {
        return $this->prix_ambiance;
    }

    public function setPrixAmbiance(int $prix_ambiance): self
    {
        $this->prix_ambiance = $prix_ambiance;

        return $this;
    }

    public function getNomAmbiance(): ?string
    {
        return $this->nom_ambiance;
    }

    public function setNomAmbiance(string $nom_ambiance): self
    {
        $this->nom_ambiance = $nom_ambiance;

        return $this;
    }

    /**
     * @return Collection|meubleGroupe[]
     */
    public function getMeubleGroupe(): Collection
    {
        return $this->meuble_groupe;
    }

    public function addMeubleGroupe(meubleGroupe $meubleGroupe): self
    {
        if (!$this->meuble_groupe->contains($meubleGroupe)) {
            $this->meuble_groupe[] = $meubleGroupe;
        }

        return $this;
    }

    public function removeMeubleGroupe(meubleGroupe $meubleGroupe): self
    {
        if ($this->meuble_groupe->contains($meubleGroupe)) {
            $this->meuble_groupe->removeElement($meubleGroupe);
        }

        return $this;
    }

    /**
     * @return Collection|Devis[]
     */
    public function getDevis(): Collection
    {
        return $this->devis;
    }

    public function addDevi(Devis $devi): self
    {
        if (!$this->devis->contains($devi)) {
            $this->devis[] = $devi;
            $devi->setAmbiance($this);
        }

        return $this;
    }

    public function removeDevi(Devis $devi): self
    {
        if ($this->devis->contains($devi)) {
            $this->devis->removeElement($devi);
            // set the owning side to null (unless already changed)
            if ($devi->getAmbiance() === $this) {
                $devi->setAmbiance(null);
            }
        }

        return $this;
    }

    public function getLinkPicture(): ?string
    {
        return $this->link_picture;
    }

    public function setLinkPicture(?string $link_picture): self
    {
        $this->link_picture = $link_picture;

        return $this;
    }
}
