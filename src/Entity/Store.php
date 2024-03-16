<?php

// src/Entity/Store.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class Store
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 255)]
    private string $storeType;

    #[ORM\Column(type: 'string', length: 255)]
    private string $address;

    #[ORM\Column(type: 'string', length: 255)]
    private string $phone;

    #[ORM\Column(type: 'string', length: 255)]
    private string $openingHours;

    #[ORM\Column(type: 'json')]
    private array $services = [];

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $website = null;

    #[ORM\Column(type: 'boolean')]
    private bool $accessibility;

    #[ORM\OneToMany(mappedBy: 'store', targetEntity: Product::class)]
    private Collection $products;

    #[ORM\OneToMany(mappedBy: 'store', targetEntity: StoreRating::class)]
    private Collection $ratings;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->ratings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setStoreType(string $storeType): self
    {
        $this->storeType = $storeType;
        return $this;
    }

    public function getStoreType(): string
    {
        return $this->storeType;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setOpeningHours(string $openingHours): self
    {
        $this->openingHours = $openingHours;
        return $this;
    }

    public function getOpeningHours(): string
    {
        return $this->openingHours;
    }

    public function setServices(array $services): self
    {
        $this->services = $services;
        return $this;
    }

    public function getServices(): array
    {
        return $this->services;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;
        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setAccessibility(bool $accessibility): self
    {
        $this->accessibility = $accessibility;
        return $this;
    }

    public function getAccessibility(): bool
    {
        return $this->accessibility;
    }

    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function getRatings(): Collection
    {
        return $this->ratings;
    }

    public function isAccessibility(): ?bool
    {
        return $this->accessibility;
    }

    public function addProduct(Product $product): static
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setStore($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): static
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getStore() === $this) {
                $product->setStore(null);
            }
        }

        return $this;
    }

    public function addRating(StoreRating $rating): static
    {
        if (!$this->ratings->contains($rating)) {
            $this->ratings->add($rating);
            $rating->setStore($this);
        }

        return $this;
    }

    public function removeRating(StoreRating $rating): static
    {
        if ($this->ratings->removeElement($rating)) {
            // set the owning side to null (unless already changed)
            if ($rating->getStore() === $this) {
                $rating->setStore(null);
            }
        }

        return $this;
    }
}
