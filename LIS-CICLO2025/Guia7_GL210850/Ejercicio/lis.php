<?php 
require_once 'Models/Autoresmodel.php';
$model = new Autoresmodel();
$autor = [
    'codigo_autor'=>"APN20",
    'nombre_autor'=>"Danna",
    'nacionalidad'=>"Salvadoreña",
   
];
echo $model->insert($autor);
//echo $model->delete('EDI789');
//echo $model->update($autor);

var_dump($model->get('')); 
?>
