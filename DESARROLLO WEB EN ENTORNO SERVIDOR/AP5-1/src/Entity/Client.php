<?php
// ✅ Este namespace agrupa todas las entidades del proyecto (capa MODELO del patrón MVC)
//    Cambia "AP51" por el namespace base de tu proyecto si es distinto.
namespace AP51\Entity;

use AP51\Repository\ClientRepository;

// Repositorio personalizado asociado a esta entidad (capa de acceso a datos / persistencia)
use AP51\Entity\Order;

// Entidad relacionada en la asociación OneToMany (un cliente tiene muchos pedidos)

// Colecciones de Doctrine para manejar relaciones (OneToMany, ManyToMany, etc.)
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

// Tipos de datos de Doctrine DBAL para mapear PHP <-> Base de Datos
use Doctrine\DBAL\Types\Types;

// Atributos de mapeo ORM (Doctrine) para definir cómo se mapea esta clase a la BD
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

/**
 * 🧱 ENTIDAD Client
 *
 * - Representa un registro de la tabla CLIENTE en la base de datos.
 * - Es una clase de la capa MODELO en el patrón MVC.
 * - Está gestionada por Doctrine ORM (Object-Relational Mapping).
 *
 * Para reutilizar en el examen:
 * - Cambia el nombre de la clase (Client -> Producto, Usuario, etc.)
 * - Cambia el nombre de la tabla en #[Table(name: '...')]
 * - Cambia los atributos/columnas según el enunciado.
 */
#[Entity(repositoryClass: ClientRepository::class)] // Indica que esta clase es una entidad gestionada por Doctrine y usa un repositorio personalizado
#[Table(name: 'CLIENTE')]                           // Nombre de la tabla física en BD. OJO: Respeta mayúsculas/minúsculas según DB.
class Client
{
    /**
     * 🔑 Clave primaria de la entidad (PK)
     *
     * #[Id]           -> Marca este campo como PRIMARY KEY.
     * #[GeneratedValue('NONE')] -> NO se genera automáticamente.
     *                               - Lo tienes que asignar tú "a mano" antes de persistir.
     *                               - En un examen podrían usar 'AUTO' o 'IDENTITY' si la BD lo autoincrementa.
     *
     * #[Column(...)]  -> Configura el mapeo de la propiedad con la columna en BD.
     */
    #[Id]
    #[GeneratedValue('NONE')] // IMPORTANTE: el ID no se autogenera; el código debe llamar a setId() antes de persistir
    #[Column(name: 'CLIENTE_COD', type: Types::INTEGER)]
    private int $id;

    /**
     * Nombre del cliente.
     * - unique: true -> La columna NOMBRE no puede repetirse en la tabla.
     * - length: 45   -> Longitud máxima de la cadena (VARCHAR(45)).
     */
    #[Column(name: 'NOMBRE', type: Types::STRING, length: 45, unique: true)]
    private string $name;

    /**
     * Dirección del cliente.
     * - Obligatoria (nullable = false por defecto).
     */
    #[Column(name: 'DIREC', type: Types::STRING, length: 40)]
    private string $address;

    /**
     * Ciudad del cliente.
     */
    #[Column(name: 'CIUDAD', type: Types::STRING, length: 30)]
    private string $city;

    /**
     * Estado / Provincia del cliente.
     * - nullable: true -> Puede ser NULL en la BD.
     * - El tipo en PHP es ?string -> admite string o null.
     */
    #[Column(name: 'ESTADO', type: Types::STRING, length: 2, nullable: true)]
    private ?string $state;

    /**
     * Código postal.
     * - Se guarda como STRING porque puede incluir ceros a la izquierda o guiones.
     */
    #[Column(name: 'COD_POSTAL', type: Types::STRING, length: 9)]
    private string $postalCode;

    /**
     * Área (por ejemplo área comercial).
     * - SMALLINT -> Entero pequeño en BD.
     * - nullable: true -> Puede no tener valor.
     */
    #[Column(name: 'AREA', type: Types::SMALLINT, nullable: true)]
    private ?int $area;

    /**
     * Teléfono del cliente.
     * - Se almacena como STRING (aunque sean números) para mantener formato.
     * - nullable: true -> puede ser NULL si no se conoce.
     */
    #[Column(name: 'TELEFONO', type: Types::STRING, length: 9, nullable: true)]
    private ?string $telephone;

    /**
     * Código del representante (comercial, agente).
     * - Aquí se guarda como entero simple (no como relación).
     * - En otro diseño podrías tener una entidad Agent y hacer ManyToOne en vez de un int.
     */
    #[Column(name: 'REPR_COD', type: Types::SMALLINT, nullable: true)]
    private ?int $agent;

    /**
     * Límite de crédito del cliente.
     * - DECIMAL(9,2) en BD.
     * - En PHP se utiliza float (aunque Doctrine internamente trabajará con string).
     * - nullable: true -> cliente puede no tener límite definido.
     */
    #[Column(name: 'LIMITE_CREDITO', type: Types::DECIMAL, precision: 9, scale: 2, nullable: true)]
    private ?float $creditLimit;

    /**
     * Observaciones sobre el cliente.
     * - TEXT -> campo de texto largo.
     * - nullable: true.
     */
    #[Column(name: 'OBSERVACIONES', type: Types::TEXT, nullable: true)]
    private ?string $observation;

    /**
     * 📦 Relación OneToMany (UNO a MUCHOS) con la entidad Order.
     *
     * - Un Client puede tener muchos Order (pedidos).
     * - targetEntity: Order::class -> indica la clase de la entidad "muchos".
     * - mappedBy: 'customer' -> nombre de la propiedad en Order que referencia a Client.
     *
     * IMPORTANTE (lado inverso):
     * - Esta propiedad es el lado INVERSO de la relación.
     * - El lado DUEÑO (owning side) está en la entidad Order, en la propiedad 'customer',
     *   normalmente anotada con #[ManyToOne(..., inversedBy: 'orders')].
     *
     * Tipo Collection:
     * - Doctrine\Common\Collections\Collection -> interfaz para manejar colecciones de entidades relacionadas.
     * - Normalmente inicializada con ArrayCollection en el constructor.
     */
    #[OneToMany(targetEntity: Order::class, mappedBy: 'customer')]
    private Collection $orders;

    /**
     * Constructor de la entidad.
     * - Siempre se inicializan las colecciones (OneToMany, ManyToMany) para evitar errores de null.
     * - Al crear un Client nuevo, $orders comienza como una colección vacía.
     */
    public function __construct()
    {
        // Inicializamos la colección de pedidos asociados a este cliente
        $this->orders = new ArrayCollection();
    }

    // ─────────────────────────────────────────────────────────────
    // GETTERS y SETTERS
    // Estos métodos permiten acceder y modificar los atributos privados
    // desde fuera de la clase, respetando el encapsulamiento.
    // ─────────────────────────────────────────────────────────────

    /**
     * Devuelve el ID del cliente (clave primaria).
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Establece el ID del cliente.
     * - OBLIGATORIO en este caso porque GeneratedValue es 'NONE'.
     * - Antes de persistir una nueva entidad Client, debes llamar a setId().
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Devuelve el nombre del cliente.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Asigna el nombre del cliente.
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Devuelve la dirección del cliente.
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Asigna la dirección del cliente.
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * Devuelve la ciudad del cliente.
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Asigna la ciudad del cliente.
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * Devuelve el estado/provincia (puede ser null).
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * Asigna el estado/provincia (puede ser null).
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * Devuelve el código postal.
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * Asigna el código postal.
     */
    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * Devuelve el área (puede ser null).
     */
    public function getArea(): ?int
    {
        return $this->area;
    }

    /**
     * Asigna el área (puede ser null).
     */
    public function setArea(?int $area): void
    {
        $this->area = $area;
    }

    /**
     * Devuelve el teléfono (puede ser null).
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * Asigna el teléfono (puede ser null).
     */
    public function setTelephone(?string $telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * Devuelve el código del agente (puede ser null).
     */
    public function getAgent(): ?int
    {
        return $this->agent;
    }

    /**
     * Asigna el código del agente (puede ser null).
     */
    public function setAgent(?int $agent): void
    {
        $this->agent = $agent;
    }

    /**
     * Devuelve el límite de crédito (puede ser null).
     */
    public function getCreditLimit(): ?float
    {
        return $this->creditLimit;
    }

    /**
     * Asigna el límite de crédito (puede ser null).
     */
    public function setCreditLimit(?float $creditLimit): void
    {
        $this->creditLimit = $creditLimit;
    }

    /**
     * Devuelve las observaciones (pueden ser null).
     */
    public function getObservation(): ?string
    {
        return $this->observation;
    }

    /**
     * Asigna las observaciones (pueden ser null).
     */
    public function setObservation(?string $observation): void
    {
        $this->observation = $observation;
    }

    /**
     * Devuelve la colección de pedidos (Order) asociados a este cliente.
     * - El tipo Collection permite usar métodos como add, removeElement, contains, etc.
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    /**
     * Asigna la colección completa de pedidos.
     * - Normalmente NO se usa mucho en la práctica; se suelen usar métodos add/remove.
     * - Pero viene bien tenerlo para operaciones masivas.
     */
    public function setOrders(Collection $orders): void
    {
        $this->orders = $orders;
    }
}
