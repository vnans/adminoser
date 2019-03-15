<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FacturationRepository")
 */
class Facturation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $souscription_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $montant;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $soldeInitial;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $soldeRestant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $smsc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $serviceCode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSouscriptionId(): ?int
    {
        return $this->souscription_id;
    }

    public function setSouscriptionId(?int $souscription_id): self
    {
        $this->souscription_id = $souscription_id;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(?int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getSoldeInitial(): ?int
    {
        return $this->soldeInitial;
    }

    public function setSoldeInitial(?int $soldeInitial): self
    {
        $this->soldeInitial = $soldeInitial;

        return $this;
    }

    public function getSoldeRestant(): ?int
    {
        return $this->soldeRestant;
    }

    public function setSoldeRestant(?int $soldeRestant): self
    {
        $this->soldeRestant = $soldeRestant;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getStatut(): ?int
    {
        return $this->statut;
    }

    public function setStatut(?int $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getSmsc(): ?string
    {
        return $this->smsc;
    }

    public function setSmsc(?string $smsc): self
    {
        $this->smsc = $smsc;

        return $this;
    }

    public function getServiceCode(): ?string
    {
        return $this->serviceCode;
    }

    public function setServiceCode(?string $serviceCode): self
    {
        $this->serviceCode = $serviceCode;

        return $this;
    }
}
