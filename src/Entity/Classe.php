<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'classes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ecole $ecole_id = null;

    /**
     * @var Collection<int, ClasseUser>
     */
    #[ORM\ManyToMany(targetEntity: ClasseUser::class, mappedBy: 'classe_id')]
    private Collection $classeUsers;

    public function __construct()
    {
        $this->classeUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEcoleId(): ?Ecole
    {
        return $this->ecole_id;
    }

    public function setEcoleId(?Ecole $ecole_id): static
    {
        $this->ecole_id = $ecole_id;

        return $this;
    }

    /**
     * @return Collection<int, ClasseUser>
     */
    public function getClasseUsers(): Collection
    {
        return $this->classeUsers;
    }

    public function addClasseUser(ClasseUser $classeUser): static
    {
        if (!$this->classeUsers->contains($classeUser)) {
            $this->classeUsers->add($classeUser);
            $classeUser->addClasseId($this);
        }

        return $this;
    }

    public function removeClasseUser(ClasseUser $classeUser): static
    {
        if ($this->classeUsers->removeElement($classeUser)) {
            $classeUser->removeClasseId($this);
        }

        return $this;
    }
}
