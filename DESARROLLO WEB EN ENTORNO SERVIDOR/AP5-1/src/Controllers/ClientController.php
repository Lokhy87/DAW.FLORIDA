<?php

namespace AP51\Controllers;

use AP51\Core\EntityManager;
use AP51\Entity\Client;
use AP51\Repository\ClientRepository;
use AP51\Views\ListClientsView;

class ClientController
{
    private EntityManager $entityManager;
    private ClientRepository $repository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager->getEntityManager()->getRepository(Client::class);
    }

    /**
     * Lista todos los clientes
     *
     * @return void
     */
    public function list(): void
    {
        $clients = $this->repository->findAll();
        $view = new ListClientsView();
        $view->render($clients);
    }

    private function noRuta()
    {
        (new MainController)->noRuta();
    }
}

// Codigo comentado

class ClientController
{
    /**
     * ✅ Propiedad que almacena un objeto de nuestra clase "wrapper" EntityManager.
     *
     * - Esta clase AP51\Core\EntityManager normalmente se encarga de:
     *      → Crear y configurar el EntityManager de Doctrine.
     *      → Cargar el fichero de configuración (doctrine.php / orm.php, etc).
     *      → Devolver una instancia de Doctrine\ORM\EntityManager.
     * - Aquí NO es el EntityManager de Doctrine directamente, sino una clase intermedia propia del proyecto.
     *
     * ♻️ Para reutilizar en otros proyectos:
     * - Si tu clase envoltorio se llama diferente (por ejemplo, App\Core\DoctrineManager),
     *   cambia el tipo de la propiedad y la clase instanciada en el constructor.
     */
    private EntityManager $entityManager;

    /**
     * ✅ Propiedad que almacena el repositorio de la entidad Client.
     *
     * - Es de tipo ClientRepository, que extiende de Doctrine\ORM\EntityRepository.
     * - A través de este repositorio realizamos consultas a la BD (findAll, find, findBy...).
     * - Este repositorio está vinculado a la entidad Client mediante:
     *      #[Entity(repositoryClass: ClientRepository::class)] en la entidad.
     *
     * ♻️ Para otros proyectos:
     * - Cambia el tipo por el repositorio correspondiente a tu entidad,
     *   por ejemplo: ProductoRepository, UsuarioRepository, PedidoRepository, etc.
     */
    private ClientRepository $repository;

    /**
     * 🔧 Constructor del controlador
     *
     * - Se ejecuta automáticamente al crear una instancia de ClientController.
     * - Inicializa el EntityManager del proyecto y obtiene el repositorio de la entidad Client.
     *
     * Pasos que hace:
     * 1️⃣ Crea una nueva instancia de AP51\Core\EntityManager (tu clase propia).
     * 2️⃣ Llama a getEntityManager() para obtener el EntityManager de Doctrine.
     * 3️⃣ Llama a getRepository(Client::class) para obtener el repositorio de la entidad Client.
     *
     * Esto deja el controlador listo para hacer operaciones CRUD sobre Client.
     */
    public function __construct()
    {
        // 1️⃣ Creamos nuestro "gestor" personalizado que sabe cómo crear el EntityManager de Doctrine.
        $this->entityManager = new EntityManager();

        // 2️⃣ Obtenemos el EntityManager de Doctrine (normalmente Doctrine\ORM\EntityManager)
        // 3️⃣ Pedimos a Doctrine el repositorio de la entidad Client.
        //     - Client::class se traduce al FQCN de la entidad (p.ej. "AP51\Entity\Client").
        //     - Doctrine usa ese nombre para localizar el mapeo y devolver el repositorio adecuado.
        $this->repository = $this->entityManager
            ->getEntityManager()
            ->getRepository(Client::class);
    }

    /**
     * 📄 Acción "list": lista todos los clientes.
     *
     * - Este método forma parte del controlador dentro del patrón MVC (capa CONTROLADOR).
     * - Se invoca cuando la ruta correspondiente apunta a ClientController::list.
     *
     * Flujo de trabajo del método:
     * 1️⃣ Recupera todos los registros de la entidad Client desde la BD usando el repositorio.
     * 2️⃣ Crea una vista específica (ListClientsView) encargada de mostrar esa lista.
     * 3️⃣ Llama al método render() de la vista, pasándole los datos (array/Collection de clientes).
     *
     * @return void  No devuelve nada al caller; la salida se genera en la vista.
     */
    public function list(): void
    {
        // 1️⃣ Obtenemos todos los clientes de la base de datos.
        //    - findAll() lo hereda ClientRepository de EntityRepository (Doctrine).
        //    - Devuelve normalmente un array de objetos Client.
        $clients = $this->repository->findAll();

        // 2️⃣ Creamos la vista encargada de presentar los datos.
        //    - La vista pertenece a la capa VISTA del patrón MVC.
        //    - Se responsabiliza de generar HTML (o el formato de salida que se use).
        $view = new ListClientsView();

        // 3️⃣ Renderizamos la vista, pasándole los clientes.
        //    - El método render($clients) se encarga de recorrer la colección
        //      y mostrarlos (por ejemplo, en una tabla HTML).
        $view->render($clients);
    }

    /**
     * 🚫 Método privado para manejar rutas no válidas o no encontradas.
     *
     * - Este método sirve como "delegación" hacia otro controlador general (MainController)
     *   que se encarga de mostrar una página de error o un mensaje tipo "Ruta no encontrada".
     *
     * - Es privado porque sólo se usa internamente dentro de este controlador;
     *   no forma parte de las acciones públicas a las que pueda acceder una ruta.
     *
     * En un esquema típico:
     * - Podría usarse si alguna acción no existe, o si quieres redirigir cualquier fallo
     *   de enrutamiento a un controlador centralizado de errores.
     */
    private function noRuta()
    {
        // Creamos una nueva instancia de MainController y llamamos a su método noRuta().
        // Se asume que MainController tiene un método público noRuta() que muestra la página de error.
        (new MainController)->noRuta();
    }
}

