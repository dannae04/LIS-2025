<?php
require_once 'Controller.php';
require_once 'EjemploClase/Models/Editorialesmodel.php';
require_once 'Utils/validaciones.php';
class EditorialesController extends Controller{
    private $model;
    //la funcion constructor me sirve para instanciar el modelo de editoriales
    //para poder usarlo en los metodos de la clase
    function __construct(){
        $this->model = new Editorialesmodel();
    }

    public function index(){
        //echo "Lista de editoriales";
        $viewBag=[];
        $viewBag['editoriales']=$this->model->get();
        $this->model->get();
        $this->render('index.php', $viewBag);
 
    }

    public function create(){
        echo "Creando un nuevo editorial";
        $this->render('new.php');
    }

    public function insert(){
           $viewBag=array();

        if(isset($_POST)){
            $errores=array();
            $editorial['codigo_editorial']=$_POST['codigo_editorial'] ?? null;
            $editorial['nombre_editorial']=$_POST['nombre_editorial']?? null;
            $editorial['contacto']=$_POST['contacto']?? null;
            $editorial['telefono']=$_POST['telefono']?? null;
            if(!isCodigoEditorial($editorial['codigo_editorial'])){
                array_push($errores, "El codigo debe seguir el formato EDIxxx");
            }
            if(empty($editorial['nombre_editorial'])){
                array_push($errores, "Debes ingresar el nombre del editorial");
            }
            if(!isText($editorial['contacto'])){
                array_push($errores,"Contacto erroneo");
            }

            if(!isPhone($editorial['telefono'])){
                array_push($errores,"El telefono ingresado no tiene el formato correcto");
            }

            if(count($errores)==0){
                if($this->model->insert($editorial)!=0){
                    header('location:' .PATH. '/Editoriales');
                }
                //echo $this->model->insert($editorial);
            }
            else{
                array_push($errores,"Ya existe un editorial con ese codigo");
                $viewBag['errores']=$errores;
                $viewBag['editorial']=$editorial;
                $this->render('new.php',$viewBag);
                //print_r($errores);
            }
        }
      
    }
    //funcion para eliminar en la tabla editoriales
    public function delete($params){
        $codigo=$params[0];
        $this->model->delete($codigo);
        header('location:' .PATH. '/Editoriales');          
    }

    //funcion para editar en la tabla editoriales
    //esta funcion sirve para mostrar el formulario de edicion
    //en el cual se cargan los datos del editorial a editar
    //para que el usuario pueda editarlos
    //la funcion edit recibe como parametro el id en este caso codigo del editorial a editar
    public function edit($params) {
        $codigo = $params[0]; 
        $viewBag = []; 
        $viewBag['editorial'] = $this->model->get($codigo)[0];
        $this->render('new.php', $viewBag);
    }
//funcion para actualizar los datos del editorial
//isset me sirve para saber si la variable esta definida o no
//en este caso si el formulario fue enviado o no
    public function update() {
        if (isset($_POST)) {
            $errores = [];
            $editorial['codigo_editorial'] = $_POST['codigo_editorial'];
            $editorial['nombre_editorial'] = $_POST['nombre_editorial'];
            $editorial['contacto'] = $_POST['contacto'];
            $editorial['telefono'] = $_POST['telefono'];

            if (!isCodigoEditorial($editorial['codigo_editorial'])) {
                array_push($errores, "El código debe seguir el formato EDIxxx");
            }
            if (empty($editorial['nombre_editorial'])) {
                array_push($errores, "Debes ingresar el nombre del editorial");
            }
            if (!isText($editorial['contacto'])) {
                array_push($errores, "Contacto incorrecto");
            }
            if (!isPhone($editorial['telefono'])) {
                array_push($errores, "El teléfono ingresado no tiene el formato correcto");
            }

            if (count($errores) == 0) {
                $this->model->update($editorial);
                header('location:' . PATH . '/Editoriales');
            } else {
                $viewBag['errores'] = $errores;
                $viewBag['editorial'] = $editorial;
                $this->render('new.php', $viewBag);
            }
        }
    }
}
