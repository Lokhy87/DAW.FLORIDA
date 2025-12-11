<?php

namespace AP51\Controllers;

use AP51\Core\EntityManager;
use AP51\Entity\Product;
use AP51\Repository\ProductRepository;
use AP51\Views\ListProductsView;
use AP51\Views\FormProductView;
use AP51\Views\DeleteProductView;

class ProductController
{
    private EntityManager $entityManager;
    private ProductRepository $repository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager->getEntityManager()->getRepository(Product::class);
    }

    /**
     * Lista todos los productos
     *
     * @return void
     */
    public function list(): void
    {
        $products = $this->repository->findAll();
        $view = new ListProductsView();
        $view->render($products);
    }

    /**
     * Gestiona las operaciones CRUD según los parámetros recibidos
     *
     * Rutas disponibles:
     * - /producto/create -> crear nuevo producto
     * - /producto/update/{id} -> actualizar producto existente
     * - /producto/delete/{id} -> eliminar producto
     *
     * @param mixed ...$params Array de parámetros donde $params[0] es la acción y $params[1] es el ID (opcional)
     * @return void
     */
    public function crud(...$params): void
    {
        $action = $params[0] ?? null;
        $id = $params[1] ?? null;

        switch ($action) {
            case 'create':
                $this->create();
                break;
            case 'update':
                $this->update($id);
                break;
            case 'delete':
                $this->delete($id);
                break;
            default:
                $this->noRuta();
        }
    }

    /**
     * Crea un nuevo producto
     *
     * Si recibe datos por POST, crea el producto y redirige al listado.
     * Si no, muestra el formulario de creación.
     *
     * IMPORTANTE: El ID del producto debe ser proporcionado por el usuario (no es autogenerado)
     *
     * @return void
     */
    private function create(): void
    {
        if (isset($_POST['submit'])) {
            // Validar que los campos requeridos estén presentes
            if (!isset($_POST['id']) || !isset($_POST['description']) ||
                empty($_POST['id']) || empty($_POST['description'])) {
                $this->noRuta();
                return;
            }

            $id = intval($_POST['id']);

            // Verificar que el ID no exista ya
            $existingProduct = $this->repository->find($id);
            if ($existingProduct) {
                // El producto ya existe, mostrar error o redirigir
                $this->list();
                return;
            }

            $product = new Product();
            $product->setId($id);
            $product->setDescription($_POST['description']);

            $em = $this->entityManager->getEntityManager();
            $em->persist($product);
            $em->flush();

            $this->list();
        } else {
            $view = new FormProductView();
            $view->render(false, null);
        }
    }

    /**
     * Actualiza un producto existente
     *
     * Si recibe datos por POST, actualiza el producto y redirige al listado.
     * Si no, muestra el formulario de edición con los datos actuales del producto.
     *
     * @param string|null $id ID del producto a actualizar
     * @return void
     */
    private function update(?string $id): void
    {
        $productId = intval($id);
        $product = $this->repository->find($productId);

        if (!$product) {
            $this->noRuta();
            return;
        }

        if (isset($_POST['submit'])) {
            if (!isset($_POST['description']) || empty($_POST['description'])) {
                $this->noRuta();
                return;
            }

            $product->setDescription($_POST['description']);

            $em = $this->entityManager->getEntityManager();
            $em->flush();

            $this->list();
        } else {
            $view = new FormProductView();
            $view->render(true, $product);
        }
    }

    /**
     * Elimina un producto
     *
     * Si recibe confirmación por POST, elimina el producto y redirige al listado.
     * Si no, muestra la pantalla de confirmación de eliminación.
     *
     * @param string|null $id ID del producto a eliminar
     * @return void
     */
    private function delete(?string $id): void
    {
        $productId = intval($id);
        $product = $this->repository->find($productId);

        if (!$product) {
            $this->noRuta();
            return;
        }

        if (isset($_POST['confirm'])) {
            try {
                $em = $this->entityManager->getEntityManager();
                $em->remove($product);
                $em->flush();

                $this->list();
            } catch (\Exception $e) {
                $view = new DeleteProductView();
                $error = "No se puede eliminar el producto.";
                $view->render($product, $error);
            }
        } else {
            $view = new DeleteProductView();
            $view->render($product);
        }
    }

    private function noRuta()
    {
        (new MainController)->noRuta();
    }
}



// Codigo comentado
class ProductController
{
    /**
     * 🧱 En esta propiedad guardamos nuestro "gestor" de Doctrine.
     *
     * - NO es el EntityManager de Doctrine directamente, sino una clase propia
     *   (AP51\Core\EntityManager) que suele encargarse de:
     *      · Cargar configuración (conexión, entidades…)
     *      · Crear una instancia de Doctrine\ORM\EntityManager
     *      · Proveer el método getEntityManager() para acceder a él.
     *
     * 🔁 En otros proyectos:
     * - Cambia el tipo si tu clase wrapper se llama distinto.
     *   Ej: App\Core\DoctrineManager, Core\MyEntityManager, etc.
     */
    private EntityManager $entityManager;

    /**
     * 📦 Repositorio específico para la entidad Product.
     *
     * - Extiende de Doctrine\ORM\EntityRepository.
     * - Permite usar métodos estándar de Doctrine:
     *      · find($id)
     *      · findAll()
     *      · findBy([...])
     *      · findOneBy([...])
     * - Y también métodos personalizados que definas en ProductRepository.
     *
     * 🔁 En otros proyectos:
     * - Cambia el tipo por el repositorio de la entidad que toque:
     *   · UserRepository, ClientRepository, OrderRepository, etc.
     */
    private ProductRepository $repository;

    /**
     * 🔧 CONSTRUCTOR DEL CONTROLADOR
     *
     * - Se ejecuta al instanciar ProductController.
     * - Deja preparado:
     *      1) El gestor de Doctrine (EntityManager propio del proyecto)
     *      2) El repositorio de la entidad Product.
     *
     * Flujo:
     * - new EntityManager() -> crea el wrapper.
     * - getEntityManager()  -> devuelve el EntityManager de Doctrine.
     * - getRepository(Product::class) -> obtiene el repositorio de Product.
     */
    public function __construct()
    {
        // 1️⃣ Creamos nuestro wrapper de EntityManager (config y conexión a BD).
        $this->entityManager = new EntityManager();

        // 2️⃣ Obtenemos el EntityManager de Doctrine y 3️⃣ su repositorio para Product.
        $this->repository = $this->entityManager
            ->getEntityManager()
            ->getRepository(Product::class);
    }

    /**
     * 📄 Acción para listar todos los productos.
     *
     * - Pertenece a la capa CONTROLADOR dentro del patrón MVC.
     * - Normalmente se asocia a una ruta tipo:
     *      · GET /productos
     *
     * Flujo:
     * 1️⃣ Recupera todos los productos de la BD usando el repositorio.
     * 2️⃣ Crea la vista ListProductsView.
     * 3️⃣ Llama a render($products) para mostrar los datos.
     */
    public function list(): void
    {
        // 1️⃣ Recuperamos todos los productos de la BD.
        $products = $this->repository->findAll();

        // 2️⃣ Creamos la vista encargada de pintar el listado.
        $view = new ListProductsView();

        // 3️⃣ Renderizamos, pasándole el array/colección de productos.
        $view->render($products);
    }

    /**
     * 🧠 Método "central" de CRUD: decide qué acción ejecutar.
     *
     * - Pensado para una única ruta genérica, por ejemplo:
     *      · /producto/{accion}/{id?}
     * - Donde {accion} puede ser: create, update, delete
     * - Y {id} es opcional (necesario para update y delete).
     *
     * Firma del método:
     *  - public function crud(...$params)
     *  - Usa "argument unpacking" (...$params) para recibir parámetros variables.
     *
     * Parámetros esperados:
     *  - $params[0] → acción (string): 'create' | 'update' | 'delete'
     *  - $params[1] → id del producto (para update/delete), puede no venir.
     */
    public function crud(...$params): void
    {
        // Extraemos acción e id de los parámetros (si existen).
        $action = $params[0] ?? null;
        $id = $params[1] ?? null;

        // Según la acción recibida, llamamos al método correspondiente.
        switch ($action) {
            case 'create':
                $this->create();
                break;
            case 'update':
                $this->update($id);
                break;
            case 'delete':
                $this->delete($id);
                break;
            default:
                // Si la acción no es válida, delegamos en el manejador de rutas no encontradas.
                $this->noRuta();
        }
    }

    /**
     * ➕ Crea un nuevo producto.
     *
     * Comportamiento dual según el método HTTP:
     *
     * 1️⃣ Si NO hay POST (no se ha enviado el formulario):
     *     - Muestra el formulario de creación (FormProductView) con datos vacíos.
     *
     * 2️⃣ Si hay POST (se ha pulsado el botón submit):
     *     - Valida que existan los campos obligatorios.
     *     - Comprueba que el ID no exista ya en BD.
     *     - Crea un objeto Product, rellena sus datos.
     *     - Lo persiste con Doctrine (persist + flush).
     *     - Redirige al listado (list()).
     *
     * 🔴 IMPORTANTE: El ID NO es autogenerado.
     * - Se espera que el usuario lo introduzca en el formulario.
     */
    private function create(): void
    {
        // ¿Ha enviado el formulario? (método POST con name="submit")
        if (isset($_POST['submit'])) {

            // 1️⃣ Validación básica: campos requeridos id y description.
            if (!isset($_POST['id']) || !isset($_POST['description']) ||
                empty($_POST['id']) || empty($_POST['description'])) {
                // Si faltan datos, tratamos como ruta incorrecta (o podrías mostrar errores).
                $this->noRuta();
                return;
            }

            // 2️⃣ Convertimos el ID a entero (viene como string desde el formulario).
            $id = intval($_POST['id']);

            // 3️⃣ Comprobamos si ya existe un producto con ese ID.
            $existingProduct = $this->repository->find($id);
            if ($existingProduct) {
                // Si ya existe, no creamos uno nuevo.
                // Aquí podrías mostrar un mensaje de error; ahora simplemente recargamos la lista.
                $this->list();
                return;
            }

            // 4️⃣ Creamos una nueva instancia de Product y seteamos sus propiedades.
            $product = new Product();
            $product->setId($id);
            $product->setDescription($_POST['description']);

            // 5️⃣ Obtenemos el EntityManager de Doctrine.
            $em = $this->entityManager->getEntityManager();

            // 6️⃣ Indicamos a Doctrine que queremos persistir este nuevo objeto en la BD.
            $em->persist($product);

            // 7️⃣ Ejecutamos realmente los cambios en la BD (INSERT).
            $em->flush();

            // 8️⃣ Volvemos al listado de productos tras crear correctamente.
            $this->list();
        } else {
            // Si NO se ha enviado el formulario (GET):
            // Mostramos el formulario para crear un nuevo producto.
            // - Primer parámetro (false): indica que NO estamos editando, sino creando.
            // - Segundo parámetro (null): no hay producto previo.
            $view = new FormProductView();
            $view->render(false, null);
        }
    }

    /**
     * ✏️ Actualiza un producto existente.
     *
     * Flujo:
     * 1️⃣ Primero busca el producto por su ID.
     * 2️⃣ Si no existe, se considera ruta inválida.
     * 3️⃣ Si existe y NO hay POST:
     *       - Muestra el formulario de edición con los datos actuales.
     * 4️⃣ Si existe y HAY POST:
     *       - Valida los campos requeridos.
     *       - Modifica el objeto Product en memoria.
     *       - Llama a flush() para guardar los cambios en BD (UPDATE).
     *       - Vuelve al listado.
     *
     * @param string|null $id  ID del producto a actualizar (recibido desde la ruta).
     */
    private function update(?string $id): void
    {
        // 1️⃣ Convertimos el ID (string/null) a entero.
        $productId = intval($id);

        // 2️⃣ Buscamos el producto en la BD.
        $product = $this->repository->find($productId);

        // Si no existe el producto, no tiene sentido continuar.
        if (!$product) {
            $this->noRuta();
            return;
        }

        // 3️⃣ ¿Se ha enviado el formulario de actualización?
        if (isset($_POST['submit'])) {

            // Validamos que la descripción no esté vacía.
            if (!isset($_POST['description']) || empty($_POST['description'])) {
                $this->noRuta();
                return;
            }

            // 4️⃣ Actualizamos la descripción del producto con lo recibido del formulario.
            $product->setDescription($_POST['description']);

            // 5️⃣ Obtenemos el EntityManager de Doctrine.
            $em = $this->entityManager->getEntityManager();

            // 6️⃣ Al haber modificado una entidad ya gestionada por Doctrine,
            //    sólo necesitamos llamar a flush() para aplicar los cambios (UPDATE).
            $em->flush();

            // 7️⃣ Volvemos al listado de productos.
            $this->list();
        } else {
            // 4️⃣ Si NO se ha enviado el formulario:
            //    Mostramos el formulario de edición con los datos actuales del producto.
            //    - Primer parámetro (true): indica que estamos en modo edición.
            //    - Segundo parámetro: el objeto Product existente.
            $view = new FormProductView();
            $view->render(true, $product);
        }
    }

    /**
     * 🗑️ Elimina un producto.
     *
     * Flujo:
     * 1️⃣ Busca el producto a eliminar por ID.
     * 2️⃣ Si no existe, ruta inválida.
     * 3️⃣ Si existe y NO hay POST con confirmación:
     *       - Muestra la vista de confirmación de borrado.
     * 4️⃣ Si existe y HAY confirmación por POST:
     *       - Intenta eliminar el producto con remove() + flush().
     *       - Si hay error (por ejemplo, restricción de FK), captura la excepción
     *         y vuelve a la vista de borrado con un mensaje de error.
     *
     * @param string|null $id  ID del producto a eliminar.
     */
    private function delete(?string $id): void
    {
        // 1️⃣ Convertimos el ID a entero.
        $productId = intval($id);

        // 2️⃣ Buscamos el producto en la BD.
        $product = $this->repository->find($productId);

        // Si no existe, no se puede borrar.
        if (!$product) {
            $this->noRuta();
            return;
        }

        // 3️⃣ ¿Se ha enviado el formulario de confirmación?
        if (isset($_POST['confirm'])) {
            try {
                // 4️⃣ Eliminamos el producto.
                $em = $this->entityManager->getEntityManager();
                $em->remove($product); // Marca el objeto para eliminarlo.
                $em->flush();          // Ejecuta el DELETE en la BD.

                // 5️⃣ Volvemos al listado tras eliminar.
                $this->list();
            } catch (\Exception $e) {
                // Si ocurre una excepción (p.ej. integridad referencial):
                // Mostramos la vista de borrado con un mensaje de error.
                $view = new DeleteProductView();
                $error = "No se puede eliminar el producto.";
                $view->render($product, $error);
            }
        } else {
            // Si NO hay confirmación todavía:
            // Mostramos la pantalla de confirmación de eliminación.
            $view = new DeleteProductView();
            $view->render($product);
        }
    }

    /**
     * 🚫 Método auxiliar para manejar rutas no válidas.
     *
     * - Este método no es una acción pública, es privado.
     * - Delegamos en MainController->noRuta(), que se supone que:
     *      · Muestra una página de error 404 ó mensaje de "Ruta no válida".
     */
    private function noRuta()
    {
        (new MainController)->noRuta();
    }
}
