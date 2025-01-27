<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>
    <?php
    $name = "Mila";
    $lastname = "nava";
    echo "Hola mundo";
    $edad = 22;
    echo "Hola $name, tienes $edad años";
    echo 'Mi nombre es ' . $name .''. $lastname;

    // Coercion de tipos
    $numero=5;
    $numero2="5";
    var_dump($numero==$numero2);
    var_dump($numero===$numero2);

    //casting explicito
    $numero3=(int)$numero2;
    var_dump($numero3===$numero);
    ?>
    </body>
</hmtl>