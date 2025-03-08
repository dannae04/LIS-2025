<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" 
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"crossorigin="anonymous">
       <title>Venta de autos</title>
       <!--[if lt IE 9]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
</head>
<body>
<div class="container">
<header>
 <h1>Autos disponibles</h1>
</header>
<div class="row">

<!-- Formulario para seleccionar la marca del auto -->
<form method="POST" action="">
  <div class="form-group">
    <label for="marca">Selecciona una marca de auto:</label>
    <select class="form-control" id="marca" name="marca">
      <option value="">Seleccione...</option>
      <option value="Peugeot">Peugeot</option>
      <option value="Renault">Renault</option>
      <option value="BMW">BMW</option>
      <option value="Toyota">Toyota</option>
      <option value="Honda">Honda</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Mostrar</button>
</form>

<?php
spl_autoload_register(function($class){
if (is_file("class/{$class}.class.php")){
include_once("class/{$class}.class.php");}
else {
die("class/{$class}.class.php No existe en el proyecto");
}
});
 
// Creando los objetos para cada tipo de auto
$movil[0] = new auto("Peugeot", "307", "Gris", "img/peugeot.jpg");
$movil[1] = new auto("Renault", "Clio", "Rojo", "img/renaultclio.jpg");
$movil[2] = new auto("BMW", "X3", "Negro", "img/bmwserie6.jpg");
$movil[3] = new auto("Toyota", "Avalon", "Blanco", "img/toyota.jpg");
$movil[4] = new auto();

// Verificando si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['marca'])) {
  $marcaSeleccionada = $_POST['marca'];
  
  // Mostrando la información del auto seleccionado
  foreach($movil as $auto) {
    if ($auto->getMarca() == $marcaSeleccionada)  { 
      $auto->mostrar();
      break;
    }
  }
}
?>
</div>
</div>
</body>
</html>
