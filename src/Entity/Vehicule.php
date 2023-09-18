<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $mise_en_circulation = null;

    #[ORM\Column]
    private ?int $kilometrage = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    private ?modele $modele = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    private ?energie $energie = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    private ?employe $employe = null;

    #[ORM\ManyToOne(inversedBy: 'vehicule')]
    private ?Garage $garage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMiseEnCirculation(): ?\DateTimeInterface
    {
        return $this->mise_en_circulation;
    }

    public function setMiseEnCirculation(\DateTimeInterface $mise_en_circulation): static
    {
        $this->mise_en_circulation = $mise_en_circulation;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): static
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getModele(): ?modele
    {
        return $this->modele;
    }

    public function setModele(?modele $modele): static
    {
        $this->modele = $modele;

        return $this;
    }

    public function getEnergie(): ?energie
    {
        return $this->energie;
    }

    public function setEnergie(?energie $energie): static
    {
        $this->energie = $energie;

        return $this;
    }

    public function getEmploye(): ?employe
    {
        return $this->employe;
    }

    public function setEmploye(?employe $employe): static
    {
        $this->employe = $employe;

        return $this;
    }

    public function getGarage(): ?Garage
    {
        return $this->garage;
    }

    public function setGarage(?Garage $garage): static
    {
        $this->garage = $garage;

        return $this;
    }
}
