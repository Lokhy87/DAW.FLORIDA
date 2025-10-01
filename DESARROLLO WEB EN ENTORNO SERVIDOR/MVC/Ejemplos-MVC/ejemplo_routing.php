<?php

// Simular URL dinámica
$url = $_GET['url'] ?? 'inicio'; // Capturar la URL

// Desglosar la URL en partes (controlador, acción, parámetro)
$url_parts = explode('/', $url);

// Asignar controlador, acción y parámetro por defecto
$controlador = !empty($url_parts[0]) ? $url_parts[0] . 'Controller' : 'InicioController';
$accion = $url_parts[1] ?? 'index';
$parametro = $url_parts[2] ?? null;

// Incluir el archivo del controlador
require_once 'controllers/' . $controlador . '.php';

// Instanciar el controlador y llamar a la acción
$controladorObj = new $controlador();
call_user_func_array([$controladorObj, $accion], [$parametro]);

