<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceRepository")
 */
class Service
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
    private $gestionnaire_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reponseAbonne;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reponseDesabonne;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $statut;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $serviceParent_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGestionnaireId(): ?int
    {
        return $this->gestionnaire_id;
    }

    public function setGestionnaireId(int $gestionnaire_id): self
    {
        $this->gestionnaire_id = $gestionnaire_id;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getReponseAbonne(): ?string
    {
        return $this->reponseAbonne;
    }

    public function setReponseAbonne(string $reponseAbonne): self
    {
        $this->reponseAbonne = $reponseAbonne;

        return $this;
    }

    public function getReponseDesabonne(): ?string
    {
        return $this->reponseDesabonne;
    }

    public function setReponseDesabonne(string $reponseDesabonne): self
    {
        $this->reponseDesabonne = $reponseDesabonne;

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

    public function getServiceParentId(): ?int
    {
        return $this->serviceParent_id;
    }

    public function setServiceParentId(?int $serviceParent_id): self
    {
        $this->serviceParent_id = $serviceParent_id;

        return $this;
    }
}
