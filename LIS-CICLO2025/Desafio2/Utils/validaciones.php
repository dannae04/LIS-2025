<?php

//validar codigo de producto
function validarCodigo($var) {
    return preg_match('/^PROD[0-9]{5}$/', $var); // Validar que el código siga el formato PRODXXXXX
}

//validar cantidad de producto
function validarCantidad($var) {
    return preg_match('/^[0-9]+$/', $var); // Validar que la cantidad sea un número entero positivo
}

//validar precio de producto sea positivo
function validarPrecio($var) {
    return preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $var); // Validar que el precio sea un número positivo con hasta 2 decimales
}

?>