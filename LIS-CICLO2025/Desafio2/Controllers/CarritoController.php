<?php
require_once 'Controller.php';
require_once 'Models/VentasModel.php';
require_once 'Models/ClientesModel.php';

class CarritoController extends Controller {
    private $model; // Modelo de ventas
    private $modelClientes; // Modelo de clientes

    public function __construct() {
        if(empty($_SESSION['nombre']) ){
            header('location:'.PATH.'/Clientes/login');
        }
        if (!isset($_SESSION)) {
            session_start(); // Inicia la sesión si no está iniciada
        }
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = []; // Inicializa el carrito si no existe
        }
        $this->model = new VentasModel(); // Inicializa el modelo de ventas
        $this->modelClientes = new ClientesModel(); // Inicializa el modelo de clientes

    }

    // Agregar un producto al carrito
    public function agregar() {
        $producto = [   //array que se va a guardar en mi session carrito
            'codigo_producto' => $_POST['codigo_producto'],
            'nombre' => $_POST['nombre'],
            'precio' => $_POST['precio'],
            'cantidad' => 1 // uno por defecto
        ];
    
        $existe = false;
        foreach ($_SESSION['carrito'] as &$item) {
            if ($item['codigo_producto'] == $producto['codigo_producto']) {
                $item['cantidad']++; // si el codigo de item (de session carrito) es igual al codigo del producto que se va a agregar, entonces le sumo uno a la cantidad
                $existe = true;
                break;
            }
        }
    
        if (!$existe) {
            $_SESSION['carrito'][] = $producto; //si no existe el producto en el carriso timplemente lo agrego y guardo el producto en la session carrito
        }
    
        header('Location: ' . PATH . '/Carrito/ver'); // Redirige a la vista del carrito
        
    }

    // Mostrar la vista del carrito
    public function ver() {
        $viewBag = [];
        $viewBag['carrito'] = $_SESSION['carrito']; // Pasar el carrito a la vista
        $this->render("carrito.php", $viewBag); // Renderiza la vista del carrito
    }

    // Eliminar un producto del carrito
    public function eliminar($params) {
        $codigo_producto = $params[0]; // Obtener el código del producto a eliminar

        // Buscar y eliminar el producto del carrito
        foreach ($_SESSION['carrito'] as $index => $item) {
            if ($item['codigo_producto'] == $codigo_producto) {
                unset($_SESSION['carrito'][$index]);
                break;
            }
        }

        // Reindexar el carrito
        $_SESSION['carrito'] = array_values($_SESSION['carrito']);

        header('Location: ' . PATH . '/Carrito/ver'); // Redirigir a la vista del carrito
        exit;
    }

    public function procesarPago() {
        $codigo = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT); // Generar un código de venta aleatorio
        $cod_cliente = $this->modelClientes->getCodigoCliente($_POST['nombre']); // Obtener el código del cliente
        $fecha_venta = date('Y-m-d'); // Solo la fecha actual

        $venta = [
            'codigo_ventas' => $codigo,
            'codigo_cliente' => $cod_cliente,
            'fecha_venta' => $fecha_venta,
            'total' => $_POST['total']
        ];
        if($this->model->insert($venta) != 0){
            echo "<script>alert('Pago Procesado correctamente');</script>";
            echo "<script>window.location.href='".PATH."/Principal/index';</script>";
        }
        else{
           
        }
    }

   }

?>