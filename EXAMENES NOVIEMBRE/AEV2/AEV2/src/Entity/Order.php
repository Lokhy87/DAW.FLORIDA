<?php

namespace AEV2\Entity;

use AEV2\Repository\OrderRepository;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[Entity(repositoryClass: OrderRepository::class)]
#[Table(name: 'PEDIDO')]
class Order
{
    #[Id]
    #[GeneratedValue (strategy: "NONE")]
    #[Column(name: 'PEDIDO_NUM', type: 'integer')]
    private int $id;

    #[Column(name: 'PEDIDO_FECHA', type: 'date')]
    private \DateTime $orderDate;

    #[Column(name: 'PEDIDO_TIPO', type: 'string', length: 1, nullable: true)]
    private ?string $type = null;

    #[ManyToOne(targetEntity: Client::class, inversedBy: 'orders')]
    #[JoinColumn(name: 'CLIENTE_COD', referencedColumnName: 'CLIENTE_COD')]
    private Client $client;

    #[Column(name: 'FECHA_ENVIO', type: 'date')]
    private \DateTime $shippingDate;

    #[Column(name: 'TOTAL', type: 'decimal', precision: 8, scale: 2)]
    private float $total;

    #[OneToMany(targetEntity: Detail::class, mappedBy: 'order')]
    private Collection $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    // GETTERS Y SETTERS

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getOrderDate(): \DateTime
    {
        return $this->orderDate;
    }

    /**
     * @param \DateTime $orderDate
     */
    public function setOrderDate(\DateTime $orderDate): void
    {
        $this->orderDate = $orderDate;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @return \DateTime
     */
    public function getShippingDate(): \DateTime
    {
        return $this->shippingDate;
    }

    /**
     * @param \DateTime $shippingDate
     */
    public function setShippingDate(\DateTime $shippingDate): void
    {
        $this->shippingDate = $shippingDate;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     */
    public function setTotal(float $total): void
    {
        $this->total = $total;
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
