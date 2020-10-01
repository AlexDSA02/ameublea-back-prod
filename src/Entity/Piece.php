<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PieceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PieceRepository::class)
 */
class Piece
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
    private $nom_piece;

    /**
     * @ORM\ManyToMany(targetEntity=meubleGroupe::class, inversedBy="pieces")
     */
    private $meuble_groupe;

    /**
     * @ORM\ManyToMany(targetEntity=ambiance::class, inversedBy="pieces")
     */
    private $ambiance;

    /**
     * @ORM\OneToMany(targetEntity=PieceAmbianceMeubleGroupe::class, mappedBy="piece")
     */
    private $pieceAmbianceMeubleGroupes;



    public function __construct()
    {
        $this->meuble_groupe = new ArrayCollection();
        $this->ambiance = new ArrayCollection();
        $this->pieceAmbianceMeubleGroupes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPiece(): ?string
    {
        return $this->nom_piece;
    }

    public function setNomPiece(string $nom_piece): self
    {
        $this->nom_piece = $nom_piece;

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
     * @return Collection|ambiance[]
     */
    public function getAmbiance(): Collection
    {
        return $this->ambiance;
    }

    public function addAmbiance(ambiance $ambiance): self
    {
        if (!$this->ambiance->contains($ambiance)) {
            $this->ambiance[] = $ambiance;
        }

        return $this;
    }

    public function removeAmbiance(ambiance $ambiance): self
    {
        if ($this->ambiance->contains($ambiance)) {
            $this->ambiance->removeElement($ambiance);
        }

        return $this;
    }

    /**
     * @return Collection|PieceAmbianceMeubleGroupe[]
     */
    public function getPieceAmbianceMeubleGroupes(): Collection
    {
        return $this->pieceAmbianceMeubleGroupes;
    }

    public function addPieceAmbianceMeubleGroupe(PieceAmbianceMeubleGroupe $pieceAmbianceMeubleGroupe): self
    {
        if (!$this->pieceAmbianceMeubleGroupes->contains($pieceAmbianceMeubleGroupe)) {
            $this->pieceAmbianceMeubleGroupes[] = $pieceAmbianceMeubleGroupe;
            $pieceAmbianceMeubleGroupe->setPiece($this);
        }

        return $this;
    }

    public function removePieceAmbianceMeubleGroupe(PieceAmbianceMeubleGroupe $pieceAmbianceMeubleGroupe): self
    {
        if ($this->pieceAmbianceMeubleGroupes->contains($pieceAmbianceMeubleGroupe)) {
            $this->pieceAmbianceMeubleGroupes->removeElement($pieceAmbianceMeubleGroupe);
            // set the owning side to null (unless already changed)
            if ($pieceAmbianceMeubleGroupe->getPiece() === $this) {
                $pieceAmbianceMeubleGroupe->setPiece(null);
            }
        }

        return $this;
    }



}
