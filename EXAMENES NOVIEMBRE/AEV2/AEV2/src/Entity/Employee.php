<?php

namespace AEV2\Entity;

use AEV2\Repository\EmployeeRepository;
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

#[Entity(repositoryClass: EmployeeRepository::class)]
#[Table(name: 'EMP')]
class Employee
{
    #[Id]
    #[GeneratedValue (strategy: "NONE")]
    #[Column(name: 'EMP_NO', type: 'integer')]
    private int $id;

    #[Column(name: 'APELLIDOS', type: 'string', length: 10)]
    private string $surname;

    #[Column(name: 'OFICIO', type: 'string', length: 10)]
    private string $job;

    #[ManyToOne(targetEntity: self::class)]
    #[JoinColumn(name: 'JEFE', referencedColumnName: 'EMP_NO', nullable: true)]
    private ?Employee $boss = null;

    #[ManyToOne(targetEntity: Department::class, inversedBy: 'employees')]
    #[JoinColumn(name: 'DEPT_NO', referencedColumnName: 'DEPT_NO')]
    private Department $department;

    #[Column(name: 'FECHA_ALTA', type: 'date')]
    private \DateTime $hireDate;

    #[Column(name: 'SALARIO', type: 'integer', nullable: true)]
    private ?int $salary = null;

    #[Column(name: 'COMISION', type: 'integer', nullable: true)]
    private ?int $commission = null;

    #[OneToMany(targetEntity: Client::class, mappedBy: 'representative')]
    private Collection $clients;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
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
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getJob(): string
    {
        return $this->job;
    }

    /**
     * @param string $job
     */
    public function setJob(string $job): void
    {
        $this->job = $job;
    }

    /**
     * @return Employee|null
     */
    public function getBoss(): ?Employee
    {
        return $this->boss;
    }

    /**
     * @param Employee|null $boss
     */
    public function setBoss(?Employee $boss): void
    {
        $this->boss = $boss;
    }

    /**
     * @return Department
     */
    public function getDepartment(): Department
    {
        return $this->department;
    }

    /**
     * @param Department $department
     */
    public function setDepartment(Department $department): void
    {
        $this->department = $department;
    }

    /**
     * @return \DateTime
     */
    public function getHireDate(): \DateTime
    {
        return $this->hireDate;
    }

    /**
     * @param \DateTime $hireDate
     */
    public function setHireDate(\DateTime $hireDate): void
    {
        $this->hireDate = $hireDate;
    }

    /**
     * @return int|null
     */
    public function getSalary(): ?int
    {
        return $this->salary;
    }

    /**
     * @param int|null $salary
     */
    public function setSalary(?int $salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return int|null
     */
    public function getCommission(): ?int
    {
        return $this->commission;
    }

    /**
     * @param int|null $commission
     */
    public function setCommission(?int $commission): void
    {
        $this->commission = $commission;
    }

    /**
     * @return Collection
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    /**
     * @param Collection $clients
     */
    public function setClients(Collection $clients): void
    {
        $this->clients = $clients;
    }




}
