<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TypeLieuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    normalizationContext: ['groups' => ['type_lieu:read']],
    denormalizationContext: ['groups' => ['type_lieu:write']]
)]
#[ORM\Entity(repositoryClass: TypeLieuRepository::class)]
class TypeLieu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['type_lieu:read', 'lieu:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['type_lieu:read', 'type_lieu:write', 'lieu:read'])]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: Lieu::class, mappedBy: 'type_lieu')]
    #[Groups(['type_lieu:read'])]
    private Collection $lieu;

    public function __construct()
    {
        $this->lieu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLieu(): Collection
    {
        return $this->lieu;
    }

    public function addLieu(Lieu $lieu): static
    {
        if (!$this->lieu->contains($lieu)) {
            $this->lieu->add($lieu);
            $lieu->addTypeLieu($this);
        }

        return $this;
    }

    public function removeLieu(Lieu $lieu): static
    {
        if ($this->lieu->removeElement($lieu)) {
            $lieu->removeTypeLieu($this);
        }

        return $this;
    }
}
