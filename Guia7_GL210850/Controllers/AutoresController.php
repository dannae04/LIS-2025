<?php
require_once 'Controller.php';
require_once 'Ejercicio/Models/Autoresmodel.php';
require_once 'Utils/validaciones.php'; // Incluye las funciones comunes
class AutoresController extends Controller { // Cambiar a "AutoresController"
    private $model;
    //la funcion constructor me sirve para instanciar el modelo de editoriales
    //para poder usarlo en los metodos de la clase
    function __construct(){
        $this->model = new Autoresmodel();
    }

    public function index(){
        //echo "Lista de editoriales";
        $viewBag=[];
        $viewBag['autores']=$this->model->get();
        $this->model->get();
        $this->render('index.php', $viewBag);
 
    }

    public function create(){
        echo "Creando un nuevo autor";
        $this->render('new.php');
    }

    public function insert(){
        $viewBag=array();

     if(isset($_POST)){
         $errores=array();
         $autor['codigo_autor']=$_POST['codigo_autor'] ?? null;
         $autor['nombre_autor']=$_POST['nombre_autor'] ?? null;
         $autor['nacionalidad']=$_POST['nacionalidad']?? null;
         if(!isCodigoAutor($autor['codigo_autor'])){
             array_push($errores, "El codigo debe seguir el formato AUTxxx");
         }
         if(empty($autor['nombre_autor'])){
             array_push($errores, "Debes ingresar el nombre del autor");
         }
         if(!isText($autor['nacionalidad'])){
                array_push($errores,"Nacionalidad erronea");
         }


         if(count($errores)==0){
             if($this->model->insert($autor)!=0){
                 header('location:' .PATH. '/Autores');
             }
             //echo $this->model->insert($editorial);
         }
         else{
             array_push($errores,"Ya existe un autor con ese codigo");
             $viewBag['errores']=$errores;
             $viewBag['autor']=$autor;
             $this->render('new.php',$viewBag);
             //print_r($errores);
         }
         
         
     }
    
 }

    //funcion para eliminar en la tabla editoriales
    public function delete($params){
        $codigo=$params[0];
        $this->model->delete($codigo);
        header('location:' .PATH. '/Autores');          
    }

    //funcion para editar en la tabla editoriales
    //esta funcion sirve para mostrar el formulario de edicion
    //en el cual se cargan los datos del editorial a editar
    //para que el usuario pueda editarlos
    //la funcion edit recibe como parametro el id en este caso codigo del editorial a editar
    public function edit($params) {
        $codigo = $params[0]; 
        $viewBag = []; 
        $viewBag['autor'] = $this->model->get($codigo)[0];
        $this->render('new.php', $viewBag);
    }
//funcion para actualizar los datos del editorial
//isset me sirve para saber si la variable esta definida o no
//en este caso si el formulario fue enviado o no
    public function update() {
        if (isset($_POST)) {
            $errores = [];
            $autor['codigo_autor'] = $_POST['codigo_autor'];
            $autor['nombre_autor'] = $_POST['nombre_autor'];
            $autor['nacionalidad'] = $_POST['nacionalidad'];

            if (!isCodigoAutor($autor['codigo_autor'])) { // Cambiar isCodigoEditorial por isCodigoAutor
                array_push($errores, "El código debe seguir el formato AUTxxx");
            }
            if (empty($autor['nombre_autor'])) {
                array_push($errores, "Debes ingresar el nombre del autor");
            }
            if (!isText($autor['nacionalidad'])) { // Cambiar a isTextAutores
                array_push($errores, "Nacionalidad incorrecto");
            }

            if (count($errores) == 0) {
                $this->model->update($autor);
                header('location:' . PATH . '/Autores');
            } else {
                $viewBag['errores'] = $errores;
                $viewBag['autor'] = $autor;
                $this->render('new.php', $viewBag);
            }
        }
    }
}
