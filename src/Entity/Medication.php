<?php

namespace App\Entity;

use App\Repository\MedicationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedicationRepository::class)]
class Medication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 4)]
    private ?string $Dose = null;

    #[ORM\Column(length: 100)]
    private ?string $Unit = null;

    #[ORM\Column(length: 150)]
    private ?string $Frequency = null;

    #[ORM\Column(length: 150)]
    private ?string $Duration = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Notes = null;

    #[ORM\OneToOne(mappedBy: 'MedicationId', cascade: ['persist', 'remove'])]
    private ?History $history = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getDose(): ?string
    {
        return $this->Dose;
    }

    public function setDose(string $Dose): static
    {
        $this->Dose = $Dose;

        return $this;
    }

    public function getUnit(): ?string
    {
        return $this->Unit;
    }

    public function setUnit(string $Unit): static
    {
        $this->Unit = $Unit;

        return $this;
    }

    public function getFrequency(): ?string
    {
        return $this->Frequency;
    }

    public function setFrequency(string $Frequency): static
    {
        $this->Frequency = $Frequency;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->Duration;
    }

    public function setDuration(string $Duration): static
    {
        $this->Duration = $Duration;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->Notes;
    }

    public function setNotes(?string $Notes): static
    {
        $this->Notes = $Notes;

        return $this;
    }

    public function getHistory(): ?History
    {
        return $this->history;
    }

    public function setHistory(History $history): static
    {
        // set the owning side of the relation if necessary
        if ($history->getMedicationId() !== $this) {
            $history->setMedicationId($this);
        }

        $this->history = $history;

        return $this;
    }
}
