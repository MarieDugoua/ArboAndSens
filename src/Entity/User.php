<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthdate;

    /**
     * @ORM\OneToMany(targetEntity=Address::class, mappedBy="user", orphanRemoval=true)
     */
    private $addresses;

    /**
     * @ORM\OneToMany(targetEntity=PaymentInfo::class, mappedBy="user", orphanRemoval=true)
     */
    private $paymentInfos;

    /**
     * @ORM\OneToMany(targetEntity=FeedBack::class, mappedBy="user")
     */
    private $feedBacks;

    /**
     * @ORM\OneToMany(targetEntity=OrderHistory::class, mappedBy="user")
     */
    private $orderHistories;

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
        $this->paymentInfos = new ArrayCollection();
        $this->feedBacks = new ArrayCollection();
        $this->orderHistories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * @return Collection|Address[]
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(Address $address): self
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses[] = $address;
            $address->setUser($this);
        }

        return $this;
    }

    public function removeAddress(Address $address): self
    {
        if ($this->addresses->removeElement($address)) {
            // set the owning side to null (unless already changed)
            if ($address->getUser() === $this) {
                $address->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PaymentInfo[]
     */
    public function getPaymentInfos(): Collection
    {
        return $this->paymentInfos;
    }

    public function addPaymentInfo(PaymentInfo $paymentInfo): self
    {
        if (!$this->paymentInfos->contains($paymentInfo)) {
            $this->paymentInfos[] = $paymentInfo;
            $paymentInfo->setUser($this);
        }

        return $this;
    }

    public function removePaymentInfo(PaymentInfo $paymentInfo): self
    {
        if ($this->paymentInfos->removeElement($paymentInfo)) {
            // set the owning side to null (unless already changed)
            if ($paymentInfo->getUser() === $this) {
                $paymentInfo->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FeedBack[]
     */
    public function getFeedBacks(): Collection
    {
        return $this->feedBacks;
    }

    public function addFeedBack(FeedBack $feedBack): self
    {
        if (!$this->feedBacks->contains($feedBack)) {
            $this->feedBacks[] = $feedBack;
            $feedBack->setUser($this);
        }

        return $this;
    }

    public function removeFeedBack(FeedBack $feedBack): self
    {
        if ($this->feedBacks->removeElement($feedBack)) {
            // set the owning side to null (unless already changed)
            if ($feedBack->getUser() === $this) {
                $feedBack->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|OrderHistory[]
     */
    public function getOrderHistories(): Collection
    {
        return $this->orderHistories;
    }

    public function addOrderHistory(OrderHistory $orderHistory): self
    {
        if (!$this->orderHistories->contains($orderHistory)) {
            $this->orderHistories[] = $orderHistory;
            $orderHistory->setUser($this);
        }

        return $this;
    }

    public function removeOrderHistory(OrderHistory $orderHistory): self
    {
        if ($this->orderHistories->removeElement($orderHistory)) {
            // set the owning side to null (unless already changed)
            if ($orderHistory->getUser() === $this) {
                $orderHistory->setUser(null);
            }
        }

        return $this;
    }
}
