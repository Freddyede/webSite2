<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $image;

    /**
     * @ORM\Column(type="text")
     */
    private $price;

    /**
     * @ORM\Column(type="text")
     */
    private $url;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Singers", mappedBy="products")
     */
    private $singers;

    public function __construct()
    {
        $this->singers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return Collection|Singers[]
     */
    public function getSingers(): Collection
    {
        return $this->singers;
    }

    public function addSinger(Singers $singer): self
    {
        if (!$this->singers->contains($singer)) {
            $this->singers[] = $singer;
            $singer->setProducts($this);
        }

        return $this;
    }

    public function removeSinger(Singers $singer): self
    {
        if ($this->singers->contains($singer)) {
            $this->singers->removeElement($singer);
            // set the owning side to null (unless already changed)
            if ($singer->getProducts() === $this) {
                $singer->setProducts(null);
            }
        }

        return $this;
    }
}
