<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AvisRepository;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    normalizationContext: ['groups' => ['avis:read']],
    denormalizationContext: ['groups' => ['avis:write']]
)]
#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['avis:read', 'lieu:read', 'user:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Lieu::class, inversedBy: 'avis')]
    #[Groups(['avis:read', 'avis:write'])]
    private ?Lieu $lieu = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'avis')]
    #[Groups(['avis:read', 'avis:write'])]
    private ?User $user = null;

    #[ORM\Column(type: 'text')]
    #[Groups(['avis:read', 'avis:write'])]
    private ?string $commentaire = null;

    #[ORM\Column]
    #[Groups(['avis:read', 'avis:write'])]
    private ?int $note = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;

        return $this;
    }
}
