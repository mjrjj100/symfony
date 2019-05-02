<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonnageRepository")
 */
class Personnage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\race")
     */
    private $race;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\faction", inversedBy="id_personnage")
     */
    private $faction;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\job")
     */
    private $classe;

    public function __construct()
    {
        $this->race = new ArrayCollection();
        $this->faction = new ArrayCollection();
        $this->classe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|race[]
     */
    public function getRace(): Collection
    {
        return $this->race;
    }

    public function addRace(race $race): self
    {
        if (!$this->race->contains($race)) {
            $this->race[] = $race;
        }

        return $this;
    }

    public function removeRace(race $race): self
    {
        if ($this->race->contains($race)) {
            $this->race->removeElement($race);
        }

        return $this;
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
     * @return Collection|faction[]
     */
    public function getFaction(): Collection
    {
        return $this->faction;
    }

    public function addFaction(faction $faction): self
    {
        if (!$this->faction->contains($faction)) {
            $this->faction[] = $faction;
        }

        return $this;
    }

    public function removeFaction(faction $faction): self
    {
        if ($this->faction->contains($faction)) {
            $this->faction->removeElement($faction);
        }

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection|job[]
     */
    public function getClasse(): Collection
    {
        return $this->classe;
    }

    public function addClasse(job $classe): self
    {
        if (!$this->classe->contains($classe)) {
            $this->classe[] = $classe;
        }

        return $this;
    }

    public function removeClasse(job $classe): self
    {
        if ($this->classe->contains($classe)) {
            $this->classe->removeElement($classe);
        }

        return $this;
    }
}
