<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $niv_avis = 0;

    #[ORM\Column(length: 255)]
    private ?string $com_avis = null;

    #[ORM\ManyToOne(inversedBy: 'avis')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'avis')]
    private ?Lieu $lieu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNivAvis(): ?int
    {
        return $this->niv_avis;
    }

    public function setNivAvis(int $niv_avis): static
    {
        $this->niv_avis = $niv_avis;

        return $this;
    }

    public function getComAvis(): ?string
    {
        return $this->com_avis;
    }

    public function setComAvis(string $com_avis): static
    {
        $this->com_avis = $com_avis;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getLieu(): ?Lieu
    {
        return $this->lieu;
    }

    public function setLieu(?Lieu $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }
}
