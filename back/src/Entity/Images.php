<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImagesRepository")
 */
class Images
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $img;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Singers", inversedBy="images", cascade={"persist", "remove"})
     */
    private $singer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getSinger(): ?Singers
    {
        return $this->singer;
    }

    public function setSinger(?Singers $singer): self
    {
        $this->singer = $singer;

        return $this;
    }
}
