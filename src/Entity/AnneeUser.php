<?php

namespace App\Entity;

use App\Repository\AnneeUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnneeUserRepository::class)]
class AnneeUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Utilisateur>
     */
    #[ORM\ManyToMany(targetEntity: Utilisateur::class, inversedBy: 'anneeUsers')]
    private Collection $user_id;

    /**
     * @var Collection<int, Destination>
     */
    #[ORM\ManyToMany(targetEntity: Destination::class, inversedBy: 'anneeUsers')]
    private Collection $destination_id;

    #[ORM\Column]
    private ?int $annee = null;

    public function __construct()
    {
        $this->user_id = new ArrayCollection();
        $this->destination_id = new ArrayCollection();
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
     * @return Collection<int, Destination>
     */
    public function getDestinationId(): Collection
    {
        return $this->destination_id;
    }

    public function addDestinationId(Destination $destinationId): static
    {
        if (!$this->destination_id->contains($destinationId)) {
            $this->destination_id->add($destinationId);
        }

        return $this;
    }

    public function removeDestinationId(Destination $destinationId): static
    {
        $this->destination_id->removeElement($destinationId);

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
