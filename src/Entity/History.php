<?php

namespace App\Entity;

use App\Repository\HistoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoryRepository::class)]
class History
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'history', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Medication $MedicationId = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $TakeDate = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $TakeTime = null;

    #[ORM\Column(length: 255)]
    private ?string $Status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedicationId(): ?Medication
    {
        return $this->MedicationId;
    }

    public function setMedicationId(Medication $MedicationId): static
    {
        $this->MedicationId = $MedicationId;

        return $this;
    }

    public function getTakeDate(): ?\DateTimeInterface
    {
        return $this->TakeDate;
    }

    public function setTakeDate(\DateTimeInterface $TakeDate): static
    {
        $this->TakeDate = $TakeDate;

        return $this;
    }

    public function getTakeTime(): ?\DateTimeInterface
    {
        return $this->TakeTime;
    }

    public function setTakeTime(\DateTimeInterface $TakeTime): static
    {
        $this->TakeTime = $TakeTime;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): static
    {
        $this->Status = $Status;

        return $this;
    }
}
