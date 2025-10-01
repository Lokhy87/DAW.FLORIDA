<?php
$url = $_GET['url'] ?? 'inicio';
$url_parts = explode('/', $url);

$controlador = !empty($url_parts[0]) ? $url_parts[0] . 'Controller' : 'InicioController';
$accion = $url_parts[1] ?? 'index';
$parametro = $url_parts[2] ?? null;

require_once 'controllers/' . $controlador . '.php';

$controladorObj = new $controlador();
call_user_func_array([$controladorObj, $accion], [$parametro]);

