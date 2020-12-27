<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MeubleUniqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MeubleUniqueRepository::class)
 */
class MeubleUnique
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
    private $facture;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_achat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix_achat;

    /**
     * @ORM\ManyToOne(targetEntity=meubleGroupe::class, inversedBy="meubleUniques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $meuble_groupe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFacture(): ?string
    {
        return $this->facture;
    }

    public function setFacture(?string $facture): self
    {
        $this->facture = $facture;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->date_achat;
    }

    public function setDateAchat(?\DateTimeInterface $date_achat): self
    {
        $this->date_achat = $date_achat;

        return $this;
    }

    public function getPrixAchat(): ?float
    {
        return $this->prix_achat;
    }

    public function setPrixAchat(?float $prix_achat): self
    {
        $this->prix_achat = $prix_achat;

        return $this;
    }

    public function getMeubleGroupe(): ?meubleGroupe
    {
        return $this->meuble_groupe;
    }

    public function setMeubleGroupe(?meubleGroupe $meuble_groupe): self
    {
        $this->meuble_groupe = $meuble_groupe;

        return $this;
    }
}
