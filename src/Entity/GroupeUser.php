<?php

namespace App\Entity;

use App\Repository\GroupeUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupeUserRepository::class)]
class GroupeUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, roleGroupe>
     */
    #[ORM\ManyToMany(targetEntity: roleGroupe::class, inversedBy: 'groupeUsers')]
    private Collection $roleGroupe_id;

    /**
     * @var Collection<int, Utilisateur>
     */
    #[ORM\ManyToMany(targetEntity: Utilisateur::class, inversedBy: 'groupeUsers')]
    private Collection $user_id;

    /**
     * @var Collection<int, Groupe>
     */
    #[ORM\ManyToMany(targetEntity: Groupe::class, inversedBy: 'groupeUsers')]
    private Collection $groupe_id;

    public function __construct()
    {
        $this->roleGroupe_id = new ArrayCollection();
        $this->user_id = new ArrayCollection();
        $this->groupe_id = new ArrayCollection();
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

    /**
     * @return Collection<int, roleGroupe>
     */
    public function getRoleGroupeId(): Collection
    {
        return $this->roleGroupe_id;
    }

    public function addRoleGroupeId(roleGroupe $roleGroupeId): static
    {
        if (!$this->roleGroupe_id->contains($roleGroupeId)) {
            $this->roleGroupe_id->add($roleGroupeId);
        }

        return $this;
    }

    public function removeRoleGroupeId(roleGroupe $roleGroupeId): static
    {
        $this->roleGroupe_id->removeElement($roleGroupeId);

        return $this;
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
     * @return Collection<int, Groupe>
     */
    public function getGroupeId(): Collection
    {
        return $this->groupe_id;
    }

    public function addGroupeId(Groupe $groupeId): static
    {
        if (!$this->groupe_id->contains($groupeId)) {
            $this->groupe_id->add($groupeId);
        }

        return $this;
    }

    public function removeGroupeId(Groupe $groupeId): static
    {
        $this->groupe_id->removeElement($groupeId);

        return $this;
    }
}
