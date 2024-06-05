<?php

namespace App\Entity;

use App\Repository\ClasseUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseUserRepository::class)]
class ClasseUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Utilisateur>
     */
    #[ORM\ManyToMany(targetEntity: Utilisateur::class, inversedBy: 'classeUsers')]
    private Collection $user_id;

    /**
     * @var Collection<int, Classe>
     */
    #[ORM\ManyToMany(targetEntity: Classe::class, inversedBy: 'classeUsers')]
    private Collection $classe_id;

    #[ORM\Column]
    private ?int $annee = null;

    public function __construct()
    {
        $this->user_id = new ArrayCollection();
        $this->classe_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function addUserId(Utilisateur $userId): static
    {
        if (!$this->user_id->contains($userId)) {
            $this->user_id->add($userId);
        }

        return $this;
    }

    public function removeUserId(Utilisateur $userId): static
    {
        $this->user_id->removeElement($userId);

        return $this;
    }

    /**
     * @return Collection<int, Classe>
     */
    public function getClasseId(): Collection
    {
        return $this->classe_id;
    }

    public function addClasseId(Classe $classeId): static
    {
        if (!$this->classe_id->contains($classeId)) {
            $this->classe_id->add($classeId);
        }

        return $this;
    }

    public function removeClasseId(Classe $classeId): static
    {
        $this->classe_id->removeElement($classeId);

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): static
    {
        $this->annee = $annee;

        return $this;
    }
}
