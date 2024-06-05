<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'utilisateurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Role $role_id = null;

    #[ORM\ManyToOne(inversedBy: 'utilisateurs')]
    private ?Groupe $groupe_id = null;

    /**
     * @var Collection<int, ClasseUser>
     */
    #[ORM\ManyToMany(targetEntity: ClasseUser::class, mappedBy: 'user_id')]
    private Collection $classeUsers;

    /**
     * @var Collection<int, AnneeUser>
     */
    #[ORM\ManyToMany(targetEntity: AnneeUser::class, mappedBy: 'user_id')]
    private Collection $anneeUsers;

    /**
     * @var Collection<int, Commentaires>
     */
    #[ORM\OneToMany(targetEntity: Commentaires::class, mappedBy: 'user_id')]
    private Collection $commentaires;

    /**
     * @var Collection<int, Message>
     */
    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'user_id')]
    private Collection $messages;

    /**
     * @var Collection<int, GroupeUser>
     */
    #[ORM\ManyToMany(targetEntity: GroupeUser::class, mappedBy: 'user_id')]
    private Collection $groupeUsers;

    public function __construct()
    {
        $this->classeUsers = new ArrayCollection();
        $this->anneeUsers = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getRoleId(): ?Role
    {
        return $this->role_id;
    }

    public function setRoleId(?Role $role_id): static
    {
        $this->role_id = $role_id;

        return $this;
    }

    public function getGroupeId(): ?Groupe
    {
        return $this->groupe_id;
    }

    public function setGroupeId(?Groupe $groupe_id): static
    {
        $this->groupe_id = $groupe_id;

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
            $classeUser->addUserId($this);
        }

        return $this;
    }

    public function removeClasseUser(ClasseUser $classeUser): static
    {
        if ($this->classeUsers->removeElement($classeUser)) {
            $classeUser->removeUserId($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, AnneeUser>
     */
    public function getAnneeUsers(): Collection
    {
        return $this->anneeUsers;
    }

    public function addAnneeUser(AnneeUser $anneeUser): static
    {
        if (!$this->anneeUsers->contains($anneeUser)) {
            $this->anneeUsers->add($anneeUser);
            $anneeUser->addUserId($this);
        }

        return $this;
    }

    public function removeAnneeUser(AnneeUser $anneeUser): static
    {
        if ($this->anneeUsers->removeElement($anneeUser)) {
            $anneeUser->removeUserId($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Commentaires>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaires $commentaire): static
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setUserId($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaires $commentaire): static
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getUserId() === $this) {
                $commentaire->setUserId(null);
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
            $message->setUserId($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): static
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getUserId() === $this) {
                $message->setUserId(null);
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
            $groupeUser->addUserId($this);
        }

        return $this;
    }

    public function removeGroupeUser(GroupeUser $groupeUser): static
    {
        if ($this->groupeUsers->removeElement($groupeUser)) {
            $groupeUser->removeUserId($this);
        }

        return $this;
    }
}
