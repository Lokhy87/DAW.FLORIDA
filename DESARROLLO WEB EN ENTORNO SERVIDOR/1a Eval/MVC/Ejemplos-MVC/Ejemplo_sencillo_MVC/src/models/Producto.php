<?php

class Producto
{
    private array $productos;

    public function __construct()
    {
        // Datos de ejemplo sin base de datos
        $this->productos = [
            [
                'id' => 1,
                'nombre' => 'Laptop HP',
                'precio' => 899.99,
                'descripcion' => 'Laptop HP con procesador Intel i5, 8GB RAM, 256GB SSD'
            ],
            [
                'id' => 2,
                'nombre' => 'Mouse Logitech',
                'precio' => 25.50,
                'descripcion' => 'Mouse óptico inalámbrico Logitech MX Master 3'
            ],
            [
                'id' => 3,
                'nombre' => 'Teclado Mecánico',
                'precio' => 129.99,
                'descripcion' => 'Teclado mecánico RGB con switches Cherry MX Blue'
            ],
            [
                'id' => 4,
                'nombre' => 'Monitor 24"',
                'precio' => 199.00,
                'descripcion' => 'Monitor LED Full HD 24 pulgadas con conectividad HDMI'
            ],
            [
                'id' => 5,
                'nombre' => 'Auriculares Sony',
                'precio' => 79.99,
                'descripcion' => 'Auriculares inalámbricos Sony con cancelación de ruido'
            ]
        ];
    }

    public function obtenerTodos()
    {
        return $this->productos;
    }
}
