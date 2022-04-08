<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="idCategorie")
     */
    private $nomCategorie;

    public function __construct()
    {
        $this->nomCategorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getNomCategorie(): Collection
    {
        return $this->nomCategorie;
    }

    public function addNomCategorie(Utilisateur $nomCategorie): self
    {
        if (!$this->nomCategorie->contains($nomCategorie)) {
            $this->nomCategorie[] = $nomCategorie;
            $nomCategorie->setIdCategorie($this);
        }

        return $this;
    }

    public function removeNomCategorie(Utilisateur $nomCategorie): self
    {
        if ($this->nomCategorie->removeElement($nomCategorie)) {
            // set the owning side to null (unless already changed)
            if ($nomCategorie->getIdCategorie() === $this) {
                $nomCategorie->setIdCategorie(null);
            }
        }

        return $this;
    }
}
