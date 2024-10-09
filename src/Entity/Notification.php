<?php

namespace App\Entity;

use App\Repository\NotificationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationRepository::class)]
class Notification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Reminder $ReminderId = null;

    #[ORM\Column(length: 255)]
    private ?string $Message = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $SentTime = null;

    #[ORM\Column(length: 255)]
    private ?string $Response = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReminderId(): ?Reminder
    {
        return $this->ReminderId;
    }

    public function setReminderId(Reminder $ReminderId): static
    {
        $this->ReminderId = $ReminderId;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(string $Message): static
    {
        $this->Message = $Message;

        return $this;
    }

    public function getSentTime(): ?\DateTimeInterface
    {
        return $this->SentTime;
    }

    public function setSentTime(\DateTimeInterface $SentTime): static
    {
        $this->SentTime = $SentTime;

        return $this;
    }

    public function getResponse(): ?string
    {
        return $this->Response;
    }

    public function setResponse(string $Response): static
    {
        $this->Response = $Response;

        return $this;
    }
}
