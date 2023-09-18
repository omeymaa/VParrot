<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
class Employe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $mot_de_passe = null;

    #[ORM\ManyToOne(inversedBy: 'employes')]
    private ?administrateur $administrateur = null;

    #[ORM\OneToMany(mappedBy: 'employe', targetEntity: Vehicule::class)]
    private Collection $vehicules;

    #[ORM\OneToMany(mappedBy: 'employe', targetEntity: Commentaire::class)]
    private Collection $commentaires;

    #[ORM\ManyToMany(targetEntity: message::class, inversedBy: 'employes')]
    private Collection $employe;

    public function __construct()
    {
        $this->vehicules = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        $this->employe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->mot_de_passe;
    }

    public function setMotDePasse(string $mot_de_passe): static
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

    public function getAdministrateur(): ?administrateur
    {
        return $this->administrateur;
    }

    public function setAdministrateur(?administrateur $administrateur): static
    {
        $this->administrateur = $administrateur;

        return $this;
    }

    /**
     * @return Collection<int, Vehicule>
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicule $vehicule): static
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules->add($vehicule);
            $vehicule->setEmploye($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): static
    {
        if ($this->vehicules->removeElement($vehicule)) {
            // set the owning side to null (unless already changed)
            if ($vehicule->getEmploye() === $this) {
                $vehicule->setEmploye(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): static
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setEmploye($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): static
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getEmploye() === $this) {
                $commentaire->setEmploye(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, message>
     */
    public function getEmploye(): Collection
    {
        return $this->employe;
    }

    public function addEmploye(message $employe): static
    {
        if (!$this->employe->contains($employe)) {
            $this->employe->add($employe);
        }

        return $this;
    }

    public function removeEmploye(message $employe): static
    {
        $this->employe->removeElement($employe);

        return $this;
    }
}
