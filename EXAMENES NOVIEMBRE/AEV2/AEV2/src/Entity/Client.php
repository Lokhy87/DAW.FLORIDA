<?php

namespace AEV2\Entity;

use AEV2\Repository\ClientRepository;
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

#[Entity(repositoryClass: ClientRepository::class)]
#[Table(name: 'CLIENTE')]
class Client
{
    #[Id]
    #[GeneratedValue (strategy: "NONE")]
    #[Column(name: 'CLIENTE_COD', type: 'integer')]
    private int $id;

    #[Column(name: 'NOMBRE', type: 'string', length: 45)]
    private string $name;

    #[Column(name: 'DIREC', type: 'string', length: 40)]
    private string $address;

    #[Column(name: 'CIUDAD', type: 'string', length: 30)]
    private string $city;

    #[Column(name: 'ESTADO', type: 'string', length: 2)]
    private string $state;

    #[Column(name: 'COD_POSTAL', type: 'string', length: 9)]
    private string $postalCode;

    #[Column(name: 'AREA', type: 'smallint', length: 3)]
    private int $area;

    #[Column(name: 'TELEFONO', type: 'string', length: 9)]
    private string $phone;

    #[ManyToOne(targetEntity: Employee::class, inversedBy: 'clients')]
    #[JoinColumn(name: 'REPR_COD', referencedColumnName: 'EMP_NO', nullable: true)]
    private ?Employee $representative = null;

    #[Column(name: 'LIMITE_CREDITO', type: 'decimal', precision: 9, scale: 2)]
    private float $creditLimit;

    #[Column(name: 'OBSERVACIONES', type: 'text', nullable: true)]
    private ?string $observations = null;

    #[OneToMany(targetEntity: Order::class, mappedBy: 'client')]
    private Collection $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return int
     */
    public function getArea(): int
    {
        return $this->area;
    }

    /**
     * @param int $area
     */
    public function setArea(int $area): void
    {
        $this->area = $area;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return Employee|null
     */
    public function getRepresentative(): ?Employee
    {
        return $this->representative;
    }

    /**
     * @param Employee|null $representative
     */
    public function setRepresentative(?Employee $representative): void
    {
        $this->representative = $representative;
    }

    /**
     * @return float
     */
    public function getCreditLimit(): float
    {
        return $this->creditLimit;
    }

    /**
     * @param float $creditLimit
     */
    public function setCreditLimit(float $creditLimit): void
    {
        $this->creditLimit = $creditLimit;
    }

    /**
     * @return string|null
     */
    public function getObservations(): ?string
    {
        return $this->observations;
    }

    /**
     * @param string|null $observations
     */
    public function setObservations(?string $observations): void
    {
        $this->observations = $observations;
    }

    /**
     * @return Collection
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    /**
     * @param Collection $orders
     */
    public function setOrders(Collection $orders): void
    {
        $this->orders = $orders;
    }



}