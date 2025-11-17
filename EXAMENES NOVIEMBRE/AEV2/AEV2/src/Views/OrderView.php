<?php

namespace AEV2\Views;

class OrderView
{
    const HTML = __DIR__ . '/../../public/assets/orders.html';

    /**
     * Renderiza el listado de pedidos
     */
    public function render(array $orders = null): void
    {
        require_once self::HTML;
    }
}
