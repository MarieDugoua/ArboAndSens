<?php

namespace App\Entity;

use App\Repository\PaymentInfoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaymentInfoRepository::class)
 */
class PaymentInfo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="paymentInfos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $cardnumber;

    /**
     * @ORM\Column(type="datetime")
     */
    private $expiredate;

    /**
     * @ORM\Column(type="integer")
     */
    private $securitynumber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCardnumber(): ?int
    {
        return $this->cardnumber;
    }

    public function setCardnumber(int $cardnumber): self
    {
        $this->cardnumber = $cardnumber;

        return $this;
    }

    public function getExpiredate(): ?\DateTimeInterface
    {
        return $this->expiredate;
    }

    public function setExpiredate(\DateTimeInterface $expiredate): self
    {
        $this->expiredate = $expiredate;

        return $this;
    }

    public function getSecuritynumber(): ?int
    {
        return $this->securitynumber;
    }

    public function setSecuritynumber(int $securitynumber): self
    {
        $this->securitynumber = $securitynumber;

        return $this;
    }
}
