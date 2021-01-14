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

    /**
     * @ORM\ManyToMany(targetEntity=Piece::class, mappedBy="meuble_groupe")
     */
    private $pieces;

    /**
     * @ORM\OneToMany(targetEntity=PieceAmbianceMeubleGroupe::class, mappedBy="meubleGroupe")
     */
    private $pieceAmbianceMeubleGroupes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link_picture;

    /**
     * @ORM\Column(type="integer")
     */
    private $qty;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ref_ameublea;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fournisseur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name_fournisseur;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $longueur;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $largeur;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $hauteur;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $diametre;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $poids;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $eco_mob;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rack;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $niveau;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $emplacement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $famille;


    public function __construct()
    {
        $this->meubleUniques = new ArrayCollection();
        $this->ambiances = new ArrayCollection();
        $this->pieces = new ArrayCollection();
        $this->pieceAmbianceMeubleGroupes = new ArrayCollection();
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

    /**
     * @return Collection|Piece[]
     */
    public function getPieces(): Collection
    {
        return $this->pieces;
    }

    public function addPiece(Piece $piece): self
    {
        if (!$this->pieces->contains($piece)) {
            $this->pieces[] = $piece;
            $piece->addMeubleGroupe($this);
        }

        return $this;
    }

    public function removePiece(Piece $piece): self
    {
        if ($this->pieces->contains($piece)) {
            $this->pieces->removeElement($piece);
            $piece->removeMeubleGroupe($this);
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
            $pieceAmbianceMeubleGroupe->setMeubleGroupe($this);
        }

        return $this;
    }

    public function removePieceAmbianceMeubleGroupe(PieceAmbianceMeubleGroupe $pieceAmbianceMeubleGroupe): self
    {
        if ($this->pieceAmbianceMeubleGroupes->contains($pieceAmbianceMeubleGroupe)) {
            $this->pieceAmbianceMeubleGroupes->removeElement($pieceAmbianceMeubleGroupe);
            // set the owning side to null (unless already changed)
            if ($pieceAmbianceMeubleGroupe->getMeubleGroupe() === $this) {
                $pieceAmbianceMeubleGroupe->setMeubleGroupe(null);
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

    public function getQty(): ?int
    {
        return $this->qty;
    }

    public function setQty(int $qty): self
    {
        $this->qty = $qty;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getRefAmeublea(): ?string
    {
        return $this->ref_ameublea;
    }

    public function setRefAmeublea(?string $ref_ameublea): self
    {
        $this->ref_ameublea = $ref_ameublea;

        return $this;
    }

    public function getFournisseur(): ?string
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?string $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getNameFournisseur(): ?string
    {
        return $this->name_fournisseur;
    }

    public function setNameFournisseur(?string $name_fournisseur): self
    {
        $this->name_fournisseur = $name_fournisseur;

        return $this;
    }

    public function getLongueur(): ?string
    {
        return $this->longueur;
    }

    public function setLongueur(?string $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?float
    {
        return $this->largeur;
    }

    public function setLargeur(?float $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getHauteur(): ?float
    {
        return $this->hauteur;
    }

    public function setHauteur(?float $hauteur): self
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    public function getDiametre(): ?float
    {
        return $this->diametre;
    }

    public function setDiametre(?float $diametre): self
    {
        $this->diametre = $diametre;

        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(?float $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getEcoMob(): ?float
    {
        return $this->eco_mob;
    }

    public function setEcoMob(?float $eco_mob): self
    {
        $this->eco_mob = $eco_mob;

        return $this;
    }

    public function getRack(): ?string
    {
        return $this->rack;
    }

    public function setRack(?string $rack): self
    {
        $this->rack = $rack;

        return $this;
    }

    public function getNiveau(): ?float
    {
        return $this->niveau;
    }

    public function setNiveau(?float $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getEmplacement(): ?float
    {
        return $this->emplacement;
    }

    public function setEmplacement(?float $emplacement): self
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    public function getFamille(): ?string
    {
        return $this->famille;
    }

    public function setFamille(?string $famille): self
    {
        $this->famille = $famille;

        return $this;
    }
}
