<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactionRepository")
 */
class Faction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personnage", mappedBy="faction")
     */
    private $id_personnage;

    public function __construct()
    {
        $this->id_personnage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Personnage[]
     */
    public function getIdPersonnage(): Collection
    {
        return $this->id_personnage;
    }

    public function addIdPersonnage(Personnage $idPersonnage): self
    {
        if (!$this->id_personnage->contains($idPersonnage)) {
            $this->id_personnage[] = $idPersonnage;
            $idPersonnage->addFaction($this);
        }

        return $this;
    }

    public function removeIdPersonnage(Personnage $idPersonnage): self
    {
        if ($this->id_personnage->contains($idPersonnage)) {
            $this->id_personnage->removeElement($idPersonnage);
            $idPersonnage->removeFaction($this);
        }

        return $this;
    }
}
