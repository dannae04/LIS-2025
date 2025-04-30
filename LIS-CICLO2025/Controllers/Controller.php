
<?php
//una clase abstracta es una clase que no se puede instanciar, pero puede ser heredada por otras clases
abstract class Controller{

    public function render($view, $viewBag=[]){
        $file="Views/".static::class."/$view";
        $file=str_replace("Controller","",$file);
        if(is_file($file)){
            extract($viewBag);
            ob_start();//Abre el buffer
            require($file);
            $content=ob_get_contents();
            ob_end_clean();//Cerrando el buffer
            echo $content;
        }
        else{
            echo "<h1>No se ha encontrado la vista</h1>";
        }
    }      
}
