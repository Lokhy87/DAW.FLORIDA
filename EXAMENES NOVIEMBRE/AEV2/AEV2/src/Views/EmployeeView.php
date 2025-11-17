<?php

namespace AEV2\Views;

class EmployeeView
{
    const HTML = __DIR__ . '/../../public/assets/employees.html';

    /**
     * Renderiza el listado de pedidos
     */
    public function render(array $employees = null): void
    {
        require_once self::HTML;
    }
}
