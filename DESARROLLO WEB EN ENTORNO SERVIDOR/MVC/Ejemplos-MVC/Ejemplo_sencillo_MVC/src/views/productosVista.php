<?php

class ProductosVista
{
    private array $productos;

    public function __construct()
    {
    }

    public function setProductos(array $productos): void
    {
        $this->productos = $productos;
    }

    public function mostrar(): void
    {
        $html = '<!DOCTYPE html>
<html>
<head>
    <title>Lista de productos</title>
</head>
<body>
    <h1>Lista de productos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
        </tr>';

        foreach ($this->productos as $producto) {
            $html .= '
        <tr>
            <td>' . htmlspecialchars($producto['id']) . '</td>
            <td>' . htmlspecialchars($producto['nombre']) . '</td>
            <td>' . number_format($producto['precio'], 2) . ' €</td>
            <td>' . htmlspecialchars($producto['descripcion']) . '</td>
        </tr>';
        }

        $html .= '
    </table>
</body>
</html>';

        echo $html;
    }
}
