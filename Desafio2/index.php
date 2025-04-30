<?php
include_once 'Controllers/ProductosController.php';
include_once 'Controllers/CategoriasController.php';
include_once 'Controllers/UsuariosController.php';
include_once 'Controllers/ClientesController.php';
include_once 'Controllers/PrincipalController.php';
include_once 'Controllers/CarritoController.php';
include_once 'Controllers/VentasController.php';

$url = $_SERVER['REQUEST_URI'];
$slices=explode('/', $url);
const PATH ='/LIS-CICLO2025/Desafio2';//para hosting dejar con una pleca
session_start(); //*session_start() inicia la sesión o reanuda la sesión actual basada en un identificador de sesión pasado mediante una solicitud GET o POST, o pasado mediante una cookie.*/
//*session_start() debe ser la primera llamada en el script, antes de que se envíe cualquier salida al navegador. Si no se llama a session_start(), no se puede acceder a $_SESSION.*/

//print_r($slices);
$controller = $slices[3]."Controller";
$method=empty($slices[4])?"index":$slices[4]; 
$params=empty($slices[5])?'':array_slice($slices,5); 

$cont = new $controller;
$cont->$method($params);

