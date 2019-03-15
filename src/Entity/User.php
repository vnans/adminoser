<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
    private $entreprise_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $salt;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $smsc;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $statut;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $etat;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $securite;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $partenairePrincipal_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntrepriseId(): ?int
    {
        return $this->entreprise_id;
    }

    public function setEntrepriseId(?int $entreprise_id): self
    {
        $this->entreprise_id = $entreprise_id;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function setSalt(?string $salt): self
    {
        $this->salt = $salt;

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

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getEtat(): ?int
    {
        return $this->etat;
    }

    public function setEtat(?int $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getSecurite(): ?int
    {
        return $this->securite;
    }

    public function setSecurite(?int $securite): self
    {
        $this->securite = $securite;

        return $this;
    }

    public function getPartenairePrincipalId(): ?int
    {
        return $this->partenairePrincipal_id;
    }

    public function setPartenairePrincipalId(?int $partenairePrincipal_id): self
    {
        $this->partenairePrincipal_id = $partenairePrincipal_id;

        return $this;
    }
}
