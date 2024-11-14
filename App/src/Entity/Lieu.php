<?php

namespace App\Entity;

use App\Repository\LieuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LieuRepository::class)]
class Lieu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: 2)]
    private ?string $moy_avis = '0';

    #[ORM\Column]
    private ?int $nb_avis = 0;

    /**
     * @var Collection<int, TypeLieu>
     */
    #[ORM\ManyToMany(targetEntity: TypeLieu::class, inversedBy: 'lieu')]
    private Collection $type_lieu;

    /**
     * @var Collection<int, Avis>
     */
    #[ORM\OneToMany(targetEntity: Avis::class, mappedBy: 'lieu')]
    private Collection $avis;

    public function __construct()
    {
        $this->type_lieu = new ArrayCollection();
        $this->avis = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMoyAvis(): ?string
    {
        return $this->moy_avis;
    }

    public function setMoyAvis(string $moy_avis): static
    {
        $this->moy_avis = $moy_avis;

        return $this;
    }

    public function getNbAvis(): ?int
    {
        return $this->nb_avis;
    }

    public function setNbAvis(int $nb_avis): static
    {
        $this->nb_avis = $nb_avis;

        return $this;
    }
    // public function __toString(): string
    // {

    //     return $this->getId();
    // }

    public function __toString(): string
    {
        return $this->nom ?? '';
    }

    /**
     * @return Collection<int, TypeLieu>
     */
    public function getTypeLieu(): Collection
    {
        return $this->type_lieu;
    }

    public function addTypeLieu(TypeLieu $typeLieu): static
    {
        if (!$this->type_lieu->contains($typeLieu)) {
            $this->type_lieu->add($typeLieu);
        }

        return $this;
    }

    public function removeTypeLieu(TypeLieu $typeLieu): static
    {
        $this->type_lieu->removeElement($typeLieu);

        return $this;
    }

    /**
     * @return Collection<int, Avis>
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): static
    {
        if (!$this->avis->contains($avi)) {
            $this->avis->add($avi);
            $avi->setLieu($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): static
    {
        if ($this->avis->removeElement($avi)) {
            // set the owning side to null (unless already changed)
            if ($avi->getLieu() === $this) {
                $avi->setLieu(null);
            }
        }

        return $this;
    }
}
