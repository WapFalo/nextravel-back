<?php

namespace App\Entity;

use App\Repository\DestinationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DestinationRepository::class)]
class Destination
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $pays = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_fin = null;

    #[ORM\Column]
    private ?int $quartiers = null;

    #[ORM\Column]
    private ?int $cout = null;

    #[ORM\Column]
    private ?int $transport = null;

    #[ORM\Column]
    private ?int $meteo = null;

    /**
     * @var Collection<int, Groupe>
     */
    #[ORM\OneToMany(targetEntity: Groupe::class, mappedBy: 'destination_id')]
    private Collection $groupes;

    /**
     * @var Collection<int, AnneeUser>
     */
    #[ORM\ManyToMany(targetEntity: AnneeUser::class, mappedBy: 'destination_id')]
    private Collection $anneeUsers;

    /**
     * @var Collection<int, Commentaires>
     */
    #[ORM\OneToMany(targetEntity: Commentaires::class, mappedBy: 'destination_id')]
    private Collection $commentaires;

    public function __construct()
    {
        $this->groupes = new ArrayCollection();
        $this->anneeUsers = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
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

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): static
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): static
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getQuartiers(): ?int
    {
        return $this->quartiers;
    }

    public function setQuartiers(int $quartiers): static
    {
        $this->quartiers = $quartiers;

        return $this;
    }

    public function getCout(): ?int
    {
        return $this->cout;
    }

    public function setCout(int $cout): static
    {
        $this->cout = $cout;

        return $this;
    }

    public function getTransport(): ?int
    {
        return $this->transport;
    }

    public function setTransport(int $transport): static
    {
        $this->transport = $transport;

        return $this;
    }

    public function getMeteo(): ?int
    {
        return $this->meteo;
    }

    public function setMeteo(int $meteo): static
    {
        $this->meteo = $meteo;

        return $this;
    }

    /**
     * @return Collection<int, Groupe>
     */
    public function getGroupes(): Collection
    {
        return $this->groupes;
    }

    public function addGroupe(Groupe $groupe): static
    {
        if (!$this->groupes->contains($groupe)) {
            $this->groupes->add($groupe);
            $groupe->setDestinationId($this);
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): static
    {
        if ($this->groupes->removeElement($groupe)) {
            // set the owning side to null (unless already changed)
            if ($groupe->getDestinationId() === $this) {
                $groupe->setDestinationId(null);
            }
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
            $anneeUser->addDestinationId($this);
        }

        return $this;
    }

    public function removeAnneeUser(AnneeUser $anneeUser): static
    {
        if ($this->anneeUsers->removeElement($anneeUser)) {
            $anneeUser->removeDestinationId($this);
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
            $commentaire->setDestinationId($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaires $commentaire): static
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getDestinationId() === $this) {
                $commentaire->setDestinationId(null);
            }
        }

        return $this;
    }
}
