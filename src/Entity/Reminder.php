<?php

namespace App\Entity;

use App\Repository\ReminderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReminderRepository::class)]
class Reminder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Medication $medicationId = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $TakingTime = null;

    #[ORM\Column(length: 100)]
    private ?string $RecurrencePattern = null;

    #[ORM\Column(length: 255)]
    private ?string $Status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedicationId(): ?Medication
    {
        return $this->medicationId;
    }

    public function setMedicationId(Medication $medicationId): static
    {
        $this->medicationId = $medicationId;

        return $this;
    }

    public function getTakingTime(): ?\DateTimeInterface
    {
        return $this->TakingTime;
    }

    public function setTakingTime(\DateTimeInterface $TakingTime): static
    {
        $this->TakingTime = $TakingTime;

        return $this;
    }

    public function getRecurrencePattern(): ?string
    {
        return $this->RecurrencePattern;
    }

    public function setRecurrencePattern(string $RecurrencePattern): static
    {
        $this->RecurrencePattern = $RecurrencePattern;

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
