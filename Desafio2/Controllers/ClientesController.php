<?php
require_once 'Controller.php';
require_once 'Models/ClientesModel.php';

Class ClientesController extends Controller{
    private $model;

    function __construct(){
        $this->model=new ClientesModel(); //inicializa la clase ModalClientes
    }

    //Este método se encarga de mostrar la vista de clientes
    public function index(){
                //verifica si la sesion esta iniciada 
                if(empty($_SESSION['rol'])){
                    header('location:'.PATH.'/Usuarios/login');
                }
                //verifica si el rol es administrador
                if($_SESSION['rol']=='administrador'){
                    $viewBag=[];
                    $viewBag['clientes']=$this->model->get();
                    $this->render("ClientesAdmin.php",$viewBag);
                }
                else{
                    echo "<script>alert('No tienes permisos para acceder a esta pagina');</script>";
                    echo "<script>window.location.href='".PATH."/Usuarios/panel';</script>";
                }
        
    }

    //Este método se encarga de mostrar la vista de registro de clientes
    public function register(){
        $viewBag=[];
        $this->render("register.php",$viewBag);
    }

    //login de clientes
    public function login(){
        $this->render("login.php");
    }

    //Este método se encarga de validar el login de clientes
    public function loginCliente(){
        $viewBag=[];
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $errores = array();
            $mail=$_POST['email'];
            $password=$_POST['password'];
            $estado=$this->model->login($mail,$password);
            if(empty($estado)){
                array_push($errores,"El correo o la contraseña son incorrectos.");
                $viewBag['errores']=$errores;
                $viewBag['email']=$mail;
                $viewBag['password']=$password;
                $this->render("login.php",$viewBag);
            }
            elseif($estado['estado']=='1'){
                $_SESSION['mail']=$mail;
                $_SESSION['nombre']=$estado['nombre'];
                header('location:'.PATH.'/Principal/index');
            }
            else{
                array_push($errores,"Su cuenta se encuentra deshabilitada, lo sentimos :(");
                $viewBag['errores']=$errores;
                $viewBag['email']=$mail;
                $viewBag['password']=$password;
                $this->render("login.php",$viewBag);
            }
        }
    }

    //funcion para cerrar sesion
    public function logout(){
        unset($_SESSION['mail']);
        unset($_SESSION['nombre']);
        $_SESSION=array();
        header('location:'.PATH.'/Principal/index');
    }


    //Este método se encarga de insertar un cliente en la base de datos
    public function insert(){
        $viewBag=[];
        $codigo = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $errores = array();

            // Validar si el correo ya existe
            if ($this->model->validarCorreo($_POST['email'])) {
                array_push($errores, "El correo ya está registrado.");
            }
            
            $clientes = [
                'codigo_cliente'=> $codigo,
                'nombre'=>$_POST['nombre'],
                'email'=>$_POST['email'],
                'password'=>$_POST['password'],
                'telefono'=>$_POST['telefono'],
                'estado'=>'1'
            ];
            // Validar errores antes de registrar
            if (count($errores) == 0) {
                if ($this->model->insert($clientes)) {
                    header('location:' . PATH . '/Clientes/register');
                    exit;
                } else {
                    array_push($errores, "Error al registrar el cliente.");
                }
            }
            else {
                // Si hay errores, renderizar la vista con los errores
                $viewBag['errores'] = $errores;
                $viewBag['clientes'] = $clientes; // Mantener los datos del formulario
                $this->render("register.php", $viewBag);
            }
        }
            
        }

    //Este método se encarga de eliminar un cliente en la base de datos
    public function delete($params){
        $codigo_cliente = $params[0];
        $this->model->delete($codigo_cliente);
        header('location:' . PATH . '/Clientes/index');
    }

    //Este método se encarga de mostrar la vista de editar cliente
    public function update($params){
        //verifica si la sesion esta iniciada 
        if(empty($_SESSION['rol'])){
            header('location:'.PATH.'/Usuarios/login');
        }
        //verifica si el rol es administrador
        if($_SESSION['rol']=='administrador'){
            $viewBag=[];
            $codigo_cliente = $params[0];
            $viewBag['clientes'] = $this->model->get($codigo_cliente)[0];
            $this->render("update.php",$viewBag);
        }
        else{
            echo "<script>alert('No tienes permisos para acceder a esta pagina');</script>";
            echo "<script>window.location.href='".PATH."/Usuarios/panel';</script>";
        }
    }

    //Este método se encarga de actualizar un cliente en la base de datos
    public function updateCliente(){
        $viewBag=[];
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $errores = array();
            $clientes = [
                'codigo_cliente'=> $_POST['codigo_cliente'],
                'nombre'=>$_POST['nombre'],
                'email'=>$_POST['email'],
                'password'=>$_POST['password'],
                'telefono'=>$_POST['telefono'],
                'estado'=> $_POST['estado']
            ];
            // Validar errores antes de actualizar
            if (count($errores) == 0) {
                if ($this->model->update($clientes)) {
                    header('location:' . PATH . '/Clientes/index');
                    exit;
                } else {
                    array_push($errores, "Error al actualizar el cliente.");
                }
            }
            else {
                // Si hay errores, renderizar la vista con los errores
                $viewBag['errores'] = $errores;
                $viewBag['clientes'] = $clientes; // Mantener los datos del formulario
                $this->render("update.php", $viewBag);
            }
        }
    }

    public function prueba(){
            $mail='mimi8@mail.com';
            $password='123';
            $estado=$this->model->login($mail,$password);
            print_r($estado);
    }


}

?>