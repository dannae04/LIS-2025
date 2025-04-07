<?php
 
function isText($var){
    return preg_match('/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/',$var);
}
 
function isCarnet($var){
    return preg_match('/^[A-Z]{2}[0-9]{6}$/',$var);
}
 
function isPhone($var){
    return preg_match('/^[267][0-9]{3}-?[0-9]{4}$/',$var);
}
 
function isMail($var){
    return filter_var($var,FILTER_VALIDATE_EMAIL);
}

function isCodigoEditorial($var){
    return preg_match('/^EDI[0-9]{3}$/',$var);
}

function isCodigoAutor($var){
    return preg_match('/^AUT[0-9]{3}$/',$var);
}