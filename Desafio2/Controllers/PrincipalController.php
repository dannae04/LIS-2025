<?php
require_once 'Controller.php';
require_once 'Models/ProductosModel.php';

class PrincipalController extends Controller{
    private $model;
    function __construct(){
        $this->model=new ProductosModel(); //inicializa la clase ModalProducts
    }

    //Este método se encarga de mostrar la vista principal
    public function index(){
        $viewBag=[];
        $viewBag['productos']=$this->model->get();
        $this->render("principal.php",$viewBag);
    }

    //Este método se encarga de mostrar la vista de detalles del producto
    public function detalles($params) {
        $codigo_producto = $params[0]; // Obtenemos el código del producto desde los parámetros de la URL
        $viewBag = [];
        $producto = $this->model->get($codigo_producto);
        $viewBag['producto'] = $producto[0]; // Accedemos al primer elemento si existe
        $this->render("detalles.php", $viewBag);
    }
}
?>