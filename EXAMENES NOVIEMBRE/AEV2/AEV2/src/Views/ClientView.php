<?php

namespace AEV2\Views;

class ClientView
{
    const HTML = __DIR__ . '/../../public/assets/clients.html';

    /**
     * Renderiza el listado de clientes
     */
    public function render(array $clients = null): void
    {
        require_once self::HTML;
    }
}
