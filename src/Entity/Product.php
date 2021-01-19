<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="product", orphanRemoval=true)
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=FeedBack::class, mappedBy="product", orphanRemoval=true)
     */
    private $feedBacks;

    /**
     * @ORM\ManyToMany(targetEntity=OrderHistory::class, mappedBy="product")
     */
    private $orderHistories;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->feedBacks = new ArrayCollection();
        $this->orderHistories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setProduct($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getProduct() === $this) {
                $image->setProduct(null);
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
            $feedBack->setProduct($this);
        }

        return $this;
    }

    public function removeFeedBack(FeedBack $feedBack): self
    {
        if ($this->feedBacks->removeElement($feedBack)) {
            // set the owning side to null (unless already changed)
            if ($feedBack->getProduct() === $this) {
                $feedBack->setProduct(null);
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
            $orderHistory->addProduct($this);
        }

        return $this;
    }

    public function removeOrderHistory(OrderHistory $orderHistory): self
    {
        if ($this->orderHistories->removeElement($orderHistory)) {
            $orderHistory->removeProduct($this);
        }

        return $this;
    }
}
