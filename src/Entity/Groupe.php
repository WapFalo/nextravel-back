<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupeRepository::class)]
class Groupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_creation = null;

    #[ORM\ManyToOne(inversedBy: 'groupes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Destination $destination_id = null;

    /**
     * @var Collection<int, Utilisateur>
     */
    #[ORM\OneToMany(targetEntity: Utilisateur::class, mappedBy: 'groupe_id')]
    private Collection $utilisateurs;

    /**
     * @var Collection<int, Message>
     */
    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'groupe_id')]
    private Collection $messages;

    /**
     * @var Collection<int, GroupeUser>
     */
    #[ORM\ManyToMany(targetEntity: GroupeUser::class, mappedBy: 'groupe_id')]
    private Collection $groupeUsers;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->messages = new ArrayCollection();
        $this->groupeUsers = new ArrayCollection();
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

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation): static
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getDestinationId(): ?Destination
    {
        return $this->destination_id;
    }

    public function setDestinationId(?Destination $destination_id): static
    {
        $this->destination_id = $destination_id;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): static
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->add($utilisateur);
            $utilisateur->setGroupeId($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): static
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getGroupeId() === $this) {
                $utilisateur->setGroupeId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): static
    {
        if (!$this->messages->contains($message)) {
            $this->messages->add($message);
            $message->setGroupeId($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): static
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getGroupeId() === $this) {
                $message->setGroupeId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GroupeUser>
     */
    public function getGroupeUsers(): Collection
    {
        return $this->groupeUsers;
    }

    public function addGroupeUser(GroupeUser $groupeUser): static
    {
        if (!$this->groupeUsers->contains($groupeUser)) {
            $this->groupeUsers->add($groupeUser);
            $groupeUser->addGroupeId($this);
        }

        return $this;
    }

    public function removeGroupeUser(GroupeUser $groupeUser): static
    {
        if ($this->groupeUsers->removeElement($groupeUser)) {
            $groupeUser->removeGroupeId($this);
        }

        return $this;
    }
}
