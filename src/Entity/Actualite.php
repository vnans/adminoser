<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActualiteRepository")
 */
class Actualite
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
    private $editeur_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $service_id;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $information;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datePublication;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateDiffusion;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $statut;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $valide;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $focus;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $differe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEditeurId(): ?int
    {
        return $this->editeur_id;
    }

    public function setEditeurId(int $editeur_id): self
    {
        $this->editeur_id = $editeur_id;

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

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getInformation(): ?string
    {
        return $this->information;
    }

    public function setInformation(string $information): self
    {
        $this->information = $information;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->datePublication;
    }

    public function setDatePublication(\DateTimeInterface $datePublication): self
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    public function getDateDiffusion(): ?\DateTimeInterface
    {
        return $this->dateDiffusion;
    }

    public function setDateDiffusion(?\DateTimeInterface $dateDiffusion): self
    {
        $this->dateDiffusion = $dateDiffusion;

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

    public function getValide(): ?int
    {
        return $this->valide;
    }

    public function setValide(?int $valide): self
    {
        $this->valide = $valide;

        return $this;
    }

    public function getFocus(): ?int
    {
        return $this->focus;
    }

    public function setFocus(?int $focus): self
    {
        $this->focus = $focus;

        return $this;
    }

    public function getDiffere(): ?int
    {
        return $this->differe;
    }

    public function setDiffere(?int $differe): self
    {
        $this->differe = $differe;

        return $this;
    }
}
