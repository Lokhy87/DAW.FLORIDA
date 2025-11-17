<?php

namespace AEV2\Controllers;

use AEV2\Core\EntityManager;
use AEV2\Entity\Order;
use AEV2\Views\OrderView;
use AEV2\Views\OrderDetailView;

class OrderController
{
    public function listOrders(): void
    {
        $entityManager = new EntityManager();
        $repo = $entityManager->getEntityManager()->getRepository(Order::class);
        $orders = $repo->findAll();

        $view = new OrderView();
        $view->render($orders);
    }

    /**
     * Añadimos función para mostrar de un pedido el detalle.
     * Ruta esperada: /pedido/read/{id}
     */
    public function readOrder(int $id): void
    {
        $entityManager = new EntityManager();
        $repo = $entityManager->getEntityManager()->getRepository(Order::class);

        // Buscar el pedido por su ID
        $order = $repo->find($id);

        // Si no existe, mostramos mensaje de error.
        if (!$order) {
            echo "<h2>❌ Pedido no encontrado (ID {$id})</h2>";
            return;
        }

        // Obtener los detalles (asociación OneToMany)
        $details = $order->getDetails(); // Asumiendo que la entidad Order tiene $details como relación

        // Pasar los datos a la vista
        $view = new OrderDetailView();
        $view->render($order, $details);
    }


}
