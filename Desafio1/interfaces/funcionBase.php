<!--LLamar los productos para que se guarden en el XML-->
<?php
$archivo_xml='productos.xml';
//Funcion para llamar los productos en el XML
  function obtenerProductos(){
   global $archivo_xml; //llamo el archivo en xm que declare fuera de la funcion
      if(!file_exists($archivo_xml)){
      return [];
    }
    $xml = simplexml_load_file($archivo_xml);
    $productos=[];
    //permite recorrer mi arreglo de productos
    foreach($xml->producto as $textil){
      $productos[]=[
        'codigo'=>(string)$textil->codigo,
        'nombre'=>(string)$textil->nombre,
        'descripcion'=>(string)$textil->descripcion,
        'imagen'=>(string)$textil->imagen,
        'categoria'=>(string)$textil->categoria,
        'precio'=>(double)$textil->precio,
        'existencia'=>(string)$textil->existencia,
        'fecha'=>(string)$textil->fecha,
        ];
    }
    return $productos; //devolver el arreglo de productos
  }
  //Funcion para guardar los productos en el XML
  function guardarProductos($productos){
    global $archivo_xml;
    $xml = new SimpleXMLElement('<productos></productos>');
    foreach($productos as $producto){
      $textil = $xml->addChild('producto');   
      $textil->addChild('codigo',$producto['codigo']);  
      $textil->addChild('nombre',$producto['nombre']);
      $textil->addChild('descripcion',$producto['descripcion']);
      $textil->addChild('imagen',$producto['imagen']);
      $textil->addChild('categoria',$producto['categoria']);
      $textil->addChild('precio',$producto['precio']);
      $textil->addChild('existencia',$producto['existencia']);
      $textil->addChild('fecha',$producto['fecha']);
    }
    $xml->asXML($archivo_xml);
    header('Location: textilProductos.php');
  }
  function codigoUnico($predefinido='PROD' , $codigoDeseado=null){ 
    $productos = obtenerProductos();
    $cont_codigo=0; //inicializo en cero para que empiece a contar desde el primer producto
    if(!empty($productos)){ 
      foreach($productos as $producto){  
        $codigo=(int)str_replace($predefinido,'',$producto['codigo']); //extraer el codigo con str_replace que me sirve para reemplazar una cadena de texto
        //y pueda reemplezarme el string por un entero
        if($codigo>$cont_codigo){  //si el codigo es mayor al contador esto me asegura que el contador sea mayor al codigo existente
          $cont_codigo=$codigo;  //el contador sera igual al codigo
        }t
  }
}
 // Si se proporciona un código específico, usarlo
 if ($codigoDeseado !== null) {
  return $predefinido . $codigoDeseado; // Devolver el código específico con el PROD
}
$nuevo_codigo= $cont_codigo +1; //incrementar el codigo
return $predefinido . $nuevo_codigo; //devolver el nuevo codigo
  }
?>