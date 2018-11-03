<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SouscriptionRepository")
 */
class Souscription
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $abonne_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $service_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateReception;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateFacturation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateReabonnement;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateDesabonnement;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $statut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAbonneId(): ?int
    {
        return $this->abonne_id;
    }

    public function setAbonneId(int $abonne_id): self
    {
        $this->abonne_id = $abonne_id;

        return $this;
    }

    public function getServiceId(): ?int
    {
        return $this->service_id;
    }

    public function setServiceId(int $service_id): self
    {
        $this->service_id = $service_id;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getDateReception(): ?\DateTimeInterface
    {
        return $this->dateReception;
    }

    public function setDateReception(?\DateTimeInterface $dateReception): self
    {
        $this->dateReception = $dateReception;

        return $this;
    }

    public function getDateFacturation(): ?\DateTimeInterface
    {
        return $this->dateFacturation;
    }

    public function setDateFacturation(?\DateTimeInterface $dateFacturation): self
    {
        $this->dateFacturation = $dateFacturation;

        return $this;
    }

    public function getDateReabonnement(): ?\DateTimeInterface
    {
        return $this->dateReabonnement;
    }

    public function setDateReabonnement(?\DateTimeInterface $dateReabonnement): self
    {
        $this->dateReabonnement = $dateReabonnement;

        return $this;
    }

    public function getDateDesabonnement(): ?\DateTimeInterface
    {
        return $this->dateDesabonnement;
    }

    public function setDateDesabonnement(?\DateTimeInterface $dateDesabonnement): self
    {
        $this->dateDesabonnement = $dateDesabonnement;

        return $this;
    }

    public function getNbre(): ?int
    {
        return $this->nbre;
    }

    public function setNbre(int $nbre): self
    {
        $this->nbre = $nbre;

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
}
