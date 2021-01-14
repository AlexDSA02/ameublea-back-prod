<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PieceAmbianceMeubleGroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PieceAmbianceMeubleGroupeRepository::class)
 */
class PieceAmbianceMeubleGroupe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=piece::class, inversedBy="pieceAmbianceMeubleGroupes")
     */
    private $piece;

    /**
     * @ORM\ManyToOne(targetEntity=ambiance::class, inversedBy="pieceAmbianceMeubleGroupes")
     */
    private $ambiance;

    /**
     * @ORM\ManyToOne(targetEntity=meubleGroupe::class, inversedBy="pieceAmbianceMeubleGroupes")
     */
    private $meubleGroupe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $newPiece;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPiece(): ?piece
    {
        return $this->piece;
    }

    public function setPiece(?piece $piece): self
    {
        $this->piece = $piece;

        return $this;
    }

    public function getAmbiance(): ?ambiance
    {
        return $this->ambiance;
    }

    public function setAmbiance(?ambiance $ambiance): self
    {
        $this->ambiance = $ambiance;

        return $this;
    }

    public function getMeubleGroupe(): ?meubleGroupe
    {
        return $this->meubleGroupe;
    }

    public function setMeubleGroupe(?meubleGroupe $meubleGroupe): self
    {
        $this->meubleGroupe = $meubleGroupe;

        return $this;
    }

    public function getNewPiece(): ?string
    {
        return $this->newPiece;
    }

    public function setNewPiece(?string $newPiece): self
    {
        $this->newPiece = $newPiece;

        return $this;
    }

}
