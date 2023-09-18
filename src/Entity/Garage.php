<?php

namespace App\Entity;

use App\Repository\GarageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GarageRepository::class)]
class Garage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $rue = null;

    #[ORM\Column(length: 255)]
    private ?string $code_postal = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $ouverture = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $fermeture = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $services = null;

    #[ORM\OneToMany(mappedBy: 'garage', targetEntity: vehicule::class)]
    private Collection $vehicule;

    public function __construct()
    {
        $this->vehicule = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): static
    {
        $this->rue = $rue;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): static
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getOuverture(): ?\DateTimeInterface
    {
        return $this->ouverture;
    }

    public function setOuverture(\DateTimeInterface $ouverture): static
    {
        $this->ouverture = $ouverture;

        return $this;
    }

    public function getFermeture(): ?\DateTimeInterface
    {
        return $this->fermeture;
    }

    public function setFermeture(\DateTimeInterface $fermeture): static
    {
        $this->fermeture = $fermeture;

        return $this;
    }

    public function getServices(): ?string
    {
        return $this->services;
    }

    public function setServices(string $services): static
    {
        $this->services = $services;

        return $this;
    }

    /**
     * @return Collection<int, vehicule>
     */
    public function getVehicule(): Collection
    {
        return $this->vehicule;
    }

    public function addVehicule(vehicule $vehicule): static
    {
        if (!$this->vehicule->contains($vehicule)) {
            $this->vehicule->add($vehicule);
            $vehicule->setGarage($this);
        }

        return $this;
    }

    public function removeVehicule(vehicule $vehicule): static
    {
        if ($this->vehicule->removeElement($vehicule)) {
            // set the owning side to null (unless already changed)
            if ($vehicule->getGarage() === $this) {
                $vehicule->setGarage(null);
            }
        }

        return $this;
    }
}
