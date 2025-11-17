<?php

namespace AEV2\Views;

class DepartmentView
{
    const HTML = __DIR__ . '/../../public/assets/departments.html';

    /**
     * Renderiza el listado de pedidos
     */
    public function render(array $departments = null): void
    {
        require_once self::HTML;
    }
}
