<?php

// src/Entity/StoreRating.php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class StoreRating
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'float')]
    private float $rating;

    #[ORM\Column(type: 'text')]
    private string $comment;

    #[ORM\ManyToOne(targetEntity: Store::class, inversedBy: 'ratings')]
    private Store $store;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function setRating(float $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

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
}
