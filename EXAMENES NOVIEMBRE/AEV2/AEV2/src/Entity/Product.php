<?php

namespace AEV2\Entity;

use AEV2\Repository\ProductRepository;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[Entity(repositoryClass: ProductRepository::class)]
#[Table(name: 'PRODUCTO')]
class Product
{
    #[Id]
    #[GeneratedValue (strategy: "NONE")]
    #[Column(name: 'PROD_NUM', type: 'integer')]
    private int $id;

    #[Column(name: 'DESCRIPCION', type: 'string', length: 30, unique: true)]
    private string $description;

    #[OneToMany(targetEntity: Detail::class, mappedBy: 'product')]
    private Collection $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Collection
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    /**
     * @param Collection $details
     */
    public function setDetails(Collection $details): void
    {
        $this->details = $details;
    }


}
