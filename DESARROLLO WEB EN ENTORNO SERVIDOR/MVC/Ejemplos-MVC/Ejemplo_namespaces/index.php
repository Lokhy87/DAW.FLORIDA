<?php

// Incluir los archivos
require 'App/Usuarios/Usuario.php';
require 'Admin/Usuarios/Usuario.php';

// Usar las clases con sus namespaces completos
$usuarioApp = new \App\Usuarios\Usuario();
$usuarioAdmin = new \Admin\Usuarios\Usuario();
