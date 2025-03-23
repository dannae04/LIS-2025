<?php 
require_once 'Autoresmodel.php';
$model = new Autoresmodel();
$autor = [
    'codigo_autor'=>"EDI789",
    'nombre_autor'=>"Danna",
    'nacionalidad'=>"Salvadoreña",
   
];
//echo $model->insert($autor);
//echo $model->delete('EDI789');
echo $model->update($autor);

var_dump($model->get('')); 
?>
