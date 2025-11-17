<?php

namespace AEV2\Entity;

use AEV2\Repository\DepartmentRepository;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[Entity(repositoryClass: DepartmentRepository::class)]
#[Table(name: 'DEPT')]
class Department
{
    #[Id]
    #[GeneratedValue (strategy: "NONE")]
    #[Column(name: 'DEPT_NO', type: 'integer')]
    private int $id;

    #[Column(name: 'DNOMBRE', type: 'string', length: 14, unique: true)]
    private string $name;

    #[Column(name: 'LOC', type: 'string', length: 14)]
    private string $location;

    #[Column(name: 'color', type: 'string', length: 20)]
    private string $color;

    #[OneToMany(targetEntity: Employee::class, mappedBy: 'department')]
    private Collection $employees;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
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
     * @return string|null
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string|null $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string|null
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string|null $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return Collection
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    /**
     * @param Collection $employees
     */
    public function setEmployees(Collection $employees): void
    {
        $this->employees = $employees;
    }


}
