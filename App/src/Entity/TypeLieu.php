<?php

namespace App\Entity;

use App\Repository\TypeLieuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeLieuRepository::class)]
class TypeLieu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    /**
     * @var Collection<int, Lieu>
     */
    #[ORM\ManyToMany(targetEntity: Lieu::class, mappedBy: 'type_lieu')]
    private Collection $lieu;

    public function __construct()
    {
        $this->lieu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Lieu>
     */
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

    public function __toString(): string
    {
        return $this->type ?? '';
    }
}
