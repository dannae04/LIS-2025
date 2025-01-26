<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Conversor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</head>

<body>
  

<br><br><div  class="container d-flex justify-content-center align-items-center" >
<table style="max-width: 20rem" alight; class= "table table-primary table-bordered ">
<?php
if(!$_POST){
    header('Location:euros.html');
}
$conversor = 0.95;
$dolar= $_POST['dolar'];

if(is_numeric($dolar) && $dolar > 0){
    $euros = $dolar * $conversor;
echo "\t\t<td>Valor en dolares: </td>\n"; 
extract($_POST);
 
    echo "\t\t<td>" . '$'. $dolar . "</td>\n"; 
    echo "\t</tr>\n"; 
    echo "\t<tr>\n"; 
    echo "\t\t<td>Equivalencia en euros:  </td>\n"; 

    echo "\t\t<td>" . '€' . $euros . "</td>\n"; 
    echo "\t</tr>\n"; 
    echo "\t<tr>\n"; 

}
else {
    echo "<p class= 'error-message'> Porfavor, ingrese una cantidad de dinero valido. </p>";
}



?>
</table>
</div>
<div  class="container d-flex justify-content-center align-items-center" >
<form method = "POST" action="">
    
    <button type="euros.html" class="btn btn-primary" >Regresar</button>
</form>
</div>
</body>
</html>




   
