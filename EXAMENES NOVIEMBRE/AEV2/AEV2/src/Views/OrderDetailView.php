<?php

namespace AEV2\Views;

class OrderDetailView
{
    const HTML = __DIR__ . '/../../public/assets/order_detail.html';

    /**
     * Renderiza el listado de pedidos
     */
    public function render(array $orders = null): void
    {
        require_once self::HTML;
    }
}
