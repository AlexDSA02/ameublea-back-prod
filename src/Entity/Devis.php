<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DevisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=DevisRepository::class)
 */
class Devis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu_livraison;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree_loc;

    /**
     * @ORM\Column(type="integer")
     */
    private $delai_prev;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat_devis;

    /**
     * @ORM\Column(type="date")
     */
    private $date_livraison;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_devis;


    /**
     * @ORM\ManyToOne(targetEntity=ambiance::class, inversedBy="devis")
     * @ORM\JoinColumn(nullable=true)
     */
    private $ambiance;

    /**
     * @ORM\ManyToOne(targetEntity=client::class, inversedBy="devis")
     */
    private $client;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_devis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_paiement;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtage(): ?string
    {
        return $this->etage;
    }

    public function setEtage(?string $etage): self
    {
        $this->etage = $etage;

        return $this;
    }

    public function getLieuLivraison(): ?string
    {
        return $this->lieu_livraison;
    }

    public function setLieuLivraison(string $lieu_livraison): self
    {
        $this->lieu_livraison = $lieu_livraison;

        return $this;
    }

    public function getDureeLoc(): ?int
    {
        return $this->duree_loc;
    }

    public function setDureeLoc(int $duree_loc): self
    {
        $this->duree_loc = $duree_loc;

        return $this;
    }

    public function getDelaiPrev(): ?int
    {
        return $this->delai_prev;
    }

    public function setDelaiPrev(int $delai_prev): self
    {
        $this->delai_prev = $delai_prev;

        return $this;
    }

    public function getEtatDevis(): ?string
    {
        return $this->etat_devis;
    }

    public function setEtatDevis(string $etat_devis): self
    {
        $this->etat_devis = $etat_devis;

        return $this;
    }

    public function getDateLivraison(): ?\DateTimeInterface
    {
        return $this->date_livraison;
    }

    public function setDateLivraison(\DateTimeInterface $date_livraison): self
    {
        $this->date_livraison = $date_livraison;

        return $this;
    }

    public function getTypeDevis(): ?string
    {
        return $this->type_devis;
    }

    public function setTypeDevis(string $type_devis): self
    {
        $this->type_devis = $type_devis;

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

    public function getClient(): ?client
    {
        return $this->client;
    }

    public function setClient(?client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getDateDevis(): ?\DateTimeInterface
    {
        return $this->date_devis;
    }

    public function setDateDevis(?\DateTimeInterface $date_devis): self
    {
        $this->date_devis = $date_devis;

        return $this;
    }

    public function getTypePaiement(): ?string
    {
        return $this->type_paiement;
    }

    public function setTypePaiement(string $type_paiement): self
    {
        $this->type_paiement = $type_paiement;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

}
