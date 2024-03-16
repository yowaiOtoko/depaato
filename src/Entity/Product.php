<?php

// src/Entity/Product.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $label;

    #[ORM\Column(type: 'text')]
    private string $description;

    #[ORM\Column(type: 'json')]
    private array $media = [];

    #[ORM\Column(type: 'json')]
    private array $services = [];

    #[ORM\Column(type: 'float')]
    private float $price;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $discountRate = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $discountedPrice = null;

    #[ORM\Column(type: 'integer')]
    private int $stock;

    #[ORM\ManyToOne(targetEntity: Store::class, inversedBy: 'products')]
    private Store $store;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: ProductRating::class)]
    private Collection $ratings;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: ProductDimension::class)]
    private Collection $dimensions;

    public function __construct()
    {
        $this->ratings = new ArrayCollection();
        $this->dimensions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getMedia(): array
    {
        return $this->media;
    }

    public function setMedia(array $media): self
    {
        $this->media = $media;
        return $this;
    }

    public function getServices(): array
    {
        return $this->services;
    }

    public function setServices(array $services): self
    {
        $this->services = $services;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getDiscountRate(): ?float
    {
        return $this->discountRate;
    }

    public function setDiscountRate(?float $discountRate): self
    {
        $this->discountRate = $discountRate;
        return $this;
    }

    public function getDiscountedPrice(): ?float
    {
        return $this->discountedPrice;
    }

    public function setDiscountedPrice(?float $discountedPrice): self
    {
        $this->discountedPrice = $discountedPrice;
        return $this;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;
        return $this;
    }

    public function getStore(): Store
    {
        return $this->store;
    }

    public function setStore(Store $store): self
    {
        $this->store = $store;
        return $this;
    }

    public function getRatings(): Collection
    {
        return $this->ratings;
    }

    public function addRating(ProductRating $rating): self
    {
        if (!$this->ratings->contains($rating)) {
            $this->ratings[] = $rating;
            $rating->setProduct($this);
        }
        return $this;
    }

    public function removeRating(ProductRating $rating): self
    {
        if ($this->ratings->removeElement($rating)) {
            if ($rating->getProduct() === $this) {
                $rating->setProduct(null);
            }
        }
        return $this;
    }

    public function getDimensions(): Collection
    {
        return $this->dimensions;
    }

    public function addDimension(ProductDimension $dimension): self
    {
        if (!$this->dimensions->contains($dimension)) {
            $this->dimensions[] = $dimension;
            $dimension->setProduct($this);
        }
        return $this;
    }

    public function removeDimension(ProductDimension $dimension): self
    {
        if ($this->dimensions->removeElement($dimension)) {
            if ($dimension->getProduct() === $this) {
                $dimension->setProduct(null);
            }
        }
        return $this;
    }


}
