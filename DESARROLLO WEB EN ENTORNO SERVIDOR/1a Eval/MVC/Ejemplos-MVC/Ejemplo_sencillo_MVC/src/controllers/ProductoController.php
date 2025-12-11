<?php
// Incluir el archivo del modelo y la vista
require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../views/productosVista.php';

class ProductoController
{
    public function mostrarProductos()
    {
        // Crear instancia del modelo Producto
        $producto = new Producto();

        // Obtener todos los productos
        $productos = $producto->obtenerTodos();

        // Crear instancia de la vista y mostrar los productos
        $vista = new ProductosVista();
        $vista->setProductos($productos);
        $vista->mostrar();
    }
}
