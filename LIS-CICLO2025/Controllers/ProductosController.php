<?php
require_once 'Controller.php';
require_once 'Models/ProductosModel.php';
require_once 'Models/CategoriasModel.php';
require_once 'Utils/validaciones.php'; 

  class ProductosController extends Controller{
    private $model;
    private $model2;

     function __construct(){
      //verifica si la sesion esta iniciada 
      if(empty($_SESSION['rol'])){
        header('location:'.PATH.'/Usuarios/login');
        }
        $this->model=new ProductosModel(); //inicializa la clase ModalProducts
        $this->model2=new CategoriasModel(); //inicializa la clase ModalCategorias
        
     }
     //Este método se encarga de mostrar la vista de productos
      public function index(){
        $viewBag=[];
        $viewBag['categorias']=$this->model2->get();
        $viewBag['tabla_productos']=$this->model->get();
        $this->render("inventario.php",$viewBag);
          
      }
      public function insert(){
        $viewBag=[];

         if($_SERVER['REQUEST_METHOD']=='POST'){
          $errores = array();

          $id_categoria = $_POST['categoria_id'];
          $categoria = $this->model2->get($id_categoria);
          $categoria = $categoria[0]['categoria_id'];
        

          $nombre_imagen = $_FILES['imagen']['name'];
          $ruta_imagen = 'img/' . $nombre_imagen;
            if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
             die("Error al subir la imagen.");

          }
            $productos = [
            'codigo_productos'=> $_POST['codigo'],
            'nombre'=>$_POST['nombre'],
            'descripcion'=>$_POST['descripcion'],
            'imagen'=>$ruta_imagen,
            'categoria_id'=>$categoria,
            'precio'=>$_POST['precio'],
            'existencias'=>$_POST['existencias']
           ];
            // Validar el código de producto
            if(!validarCodigo($productos['codigo_productos'])){
              array_push($errores, "El código de producto no es válido. Debe seguir el formato PRODXXXXX.");
            }
            //validar el precio
            if(!validarPrecio($productos['precio'])){
              array_push($errores, "El precio no es válido. Debe ser un número positivo con hasta 2 decimales.");
            }
            //validar la cantidad
            if(!validarCantidad($productos['existencias'])){
              array_push($errores, "La cantidad no es válida. Debe ser un número entero positivo.");
            }
            //validar que el producto no exista
            if (count($errores) == 0) {
                if ($this->model->insert($productos) != 0) {
                    header('location:' . PATH . '/Productos/index');
                } else {
                    array_push($errores, "Error al insertar el producto. El código de producto ya existe.");
                    $viewBag['errores'] = $errores;
                    $viewBag['productos'] = $productos; // Mantener los datos del formulario
                    $viewBag['categorias'] = $this->model2->get(); // Recargar las categorías
                    $this->render("inventario.php", $viewBag);
                }
            } else {
              $viewBag['errores'] = $errores;
              $viewBag['productos'] = $productos; // Mantener los datos del formulario
              $viewBag['categorias'] = $this->model2->get(); // Recargar las categorías
              $viewBag['tabla_productos'] = $this->model->get(); // Recargar los productos para la tabla
              $this->render("inventario.php", $viewBag);
               }           
           }
       }

      //funcion para eliminar un producto
      public function delete($params){
        $codigo=$params[0];
        $this->model->delete($codigo);
        header('location:'.PATH.'/Productos/index');
      }

      public function update($params){
        $codigo_productos=$params[0];
        $viewBag=[];
        $viewBag['categorias']=$this->model2->get();
        $viewBag['productos']=$this->model->get($codigo_productos)[0];
        $this->render("update.php",$viewBag);
      }

      public function update_productos(){
        $viewBag=[];
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $errores = array();

            $id_categoria = $_POST['categoria_id'];
            $categoria = $this->model2->get($id_categoria);
            $categoria = $categoria[0]['categoria_id'];
            
            //Esto sirve como valor por defecto si no se sube una nueva imagen.
            $ruta_imagen = $_POST['imagen_actual'];

            // Verificar si el campo imagen contiene un archivo valido
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            // Si se sube una nueva imagen, se obtiene su nombre y se define la ruta
            $nombre_imagen = $_FILES['imagen']['name'];
            $ruta_imagen_nueva = 'img/' . $nombre_imagen;

            // Intentar mover la nueva imagen al directorio
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen_nueva)) {
                $ruta_imagen = $ruta_imagen_nueva; // Usar la nueva imagen si se subió correctamente
            } else {
                die("Error al subir la nueva imagen.");
            }

        }
            
            $productos=[
                'codigo_productos'=>$_POST['codigo'],
                'nombre'=>$_POST['nombre'],
                'descripcion'=>$_POST['descripcion'],
                'imagen'=>$ruta_imagen,
                'categoria_id'=>$categoria,
                'precio'=>$_POST['precio'],
                'existencias'=>$_POST['existencias']
            ];
            //validar el precio
            if(!validarPrecio($productos['precio'])){
              array_push($errores, "El precio no es válido. Debe ser un número positivo con hasta 2 decimales.");
            }
            //validar la cantidad
            if(!validarCantidad($productos['existencias'])){
              array_push($errores, "La cantidad no es válida. Debe ser un número entero positivo.");
            }

            if (count($errores) == 0) {
                           
              $this->model->update($productos);
              header('location:' . PATH . '/Productos/index');
             
            } else {
              $viewBag['errores'] = $errores;
              $viewBag['productos'] = $productos;
              $viewBag['categorias'] = $this->model2->get(); // Recargar las categorías
              $this->render("update.php", $viewBag);
            }
          
      }

    }
  }
