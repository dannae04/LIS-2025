<?php 
require_once 'Models/Editorialesmodel.php';
$model = new Editorialesmodel();
$editorial = [
    'codigo_editorial'=>"EDI789",
    'nombre_editorial'=>"xd",
    'contacto'=>"Ale2",
    'telefono'=>"11111111"
];
//echo $model->insert($editorial);
//echo $model->delete('EDI789');
echo $model->update($editorial);

var_dump($model->get('')); 
?>
