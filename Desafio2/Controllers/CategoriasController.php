<?php
require_once 'Controllers/Controller.php';
require_once 'Models/Model.php';
require_once 'Models/CategoriasModel.php';

class CategoriasController extends Controller{
    private $model;
     function __construct(){ 
        //verifica si la sesion esta iniciada 
        if(empty($_SESSION['rol'])){
            header('location:'.PATH.'/Usuarios/login');
        }
        //verifica si el rol es administrador
        if($_SESSION['rol']=='administrador'){
            $this->model=new CategoriasModel(); //inicializa la clase ModalProducts
        }
        else{
            echo "<script>alert('No tienes permisos para acceder a esta pagina');</script>";
            echo "<script>window.location.href='".PATH."/Usuarios/panel';</script>";
        }
        $this->model=new CategoriasModel(); //inicializa la clase ModalProducts
     }

     //Este método se encarga de mostrar la vista de categorias
      public function index(){
        $viewBag=[];
        $viewBag['categorias']=$this->model->get();
        $this->render("categoria.php",$viewBag);
          
      }
      //funcion para insertar una categoria
      public function insert(){
        $viewBag=[];
         if($_SERVER['REQUEST_METHOD']=='POST'){
          $categorias = [
          'categoria_id'=> $_POST['categoria_id'],
          'nombre_categoria'=>$_POST['nombre_categoria']
         ];
         if ($this->model->insert($categorias)!=0) {
            $viewBag['message'] = [
                'type' => 'success',
                'text' => 'Categoría insertada correctamente.'
            ];
          } else {
            $viewBag['message'] = [
                'type' => 'error',
                'text' => 'Error al insertar la categoría. El ID de categoría ya existe.'
            ];
          }
          $viewBag['categorias'] = $this->model->get(); // Recargar la lista de categorías
          $this->render("categoria.php", $viewBag);
        }
    }

    //funcion para eliminar una categoria
    public function delete($params){
        $codigo=$params[0];
        $this->model->delete($codigo);
        header('location:'.PATH.'/Categorias/index');
    }

    //funcion para actualizar una categoria
    public function update($params){
        $codigo=$params[0];//obtenemos el id de la categoria a actualizar
        $viewBag=[];
        $viewBag['categorias']=$this->model->get($codigo)[0];
        $this->render("update.php",$viewBag);
    }
    public function update_categoria(){
        $viewBag=[];

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $categorias = [
                'categoria_id'=> $_POST['categoria_id'],
                'nombre_categoria'=>$_POST['nombre_categoria']
            ];
            if ($this->model->update($categorias)!=0) {
                $viewBag['message'] = [
                    'type' => 'success',
                    'text' => 'Categoria actualizada correctamente.'
                ];

            } else {
                $viewBag['message'] = [
                    'type' => 'error',
                    'text' => 'Error al actualizar la categoria. Si no cambio nada por favor darle al boton de cancelar.'
                ];
            }
            $viewBag['categorias'] = $categorias;
            $this->render("update.php", $viewBag);
        }
    }
}
?>