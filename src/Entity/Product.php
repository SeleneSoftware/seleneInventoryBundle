<?php

namespace Selene\InventoryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Selene\InventoryBundle\Repository\ProductRepository;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $sku = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 4)]
    private ?string $cost = null;

    #[ORM\Column]
    private ?int $qty = null;

    #[ORM\Column]
    private ?bool $public = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Location $location = null;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Sale::class)]
    private Collection $Sale;

    public function __construct()
    {
        $this->Sale = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCost(): ?string
    {
        return $this->cost;
    }

    public function setCost(string $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getQty(): ?int
    {
        return $this->qty;
    }

    public function setQty(int $qty): self
    {
        $this->qty = $qty;

        return $this;
    }

    public function isPublic(): ?bool
    {
        return $this->public;
    }

    public function setPublic(bool $public): self
    {
        $this->public = $public;

        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Collection<int, Sale>
     */
    public function getSale(): Collection
    {
        return $this->Sale;
    }

    public function addSale(Sale $sale): self
    {
        if (!$this->Sale->contains($sale)) {
            $this->Sale->add($sale);
            $sale->setProduct($this);
        }

        return $this;
    }

    public function removeSale(Sale $sale): self
    {
        if ($this->Sale->removeElement($sale)) {
            // set the owning side to null (unless already changed)
            if ($sale->getProduct() === $this) {
                $sale->setProduct(null);
            }
        }

        return $this;
    }
}
