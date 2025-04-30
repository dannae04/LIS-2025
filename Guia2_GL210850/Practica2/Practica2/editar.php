<?php
        session_start();
        if(isset($_POST['editar'])){
                $materias = simplexml_load_file('materias.xml');
                foreach($materias->materia as $materia){
                        if($materia->codigo == $_POST['codigo']){
                                $materia->nombre = $_POST['nombre'];
                                $materia->uvs = $_POST['uvs'];
                                $materia->nota = $_POST['nota'];
                                break;
                        }
                }
 
                file_put_contents('materias.xml', $materias->asXML());
              
                header('location: index.php');
        }
        else{
          
                header('location: index.php');
        }
 
?>
