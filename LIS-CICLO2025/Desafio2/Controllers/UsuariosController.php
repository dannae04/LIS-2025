<?php 
require_once 'Controller.php';
require_once 'Models/UsuariosModel.php';

class UsuariosController extends Controller{
    private $model;
    function __construct(){
        $this->model=new UsuariosModel(); //inicializa la clase ModalUsuarios
    }

    //funcion para iniciar sesion
    public function login(){
        $this->render("login.php");
    }

    //ir a panel de administracion
    public function panel(){
        //verifica si la sesion esta iniciada 
        if(empty($_SESSION['rol'])){
            header('location:'.PATH.'/Usuarios/login');
        }
        //verifica si el rol es administrador o empleado
        if($_SESSION['rol']=='administrador' || $_SESSION['rol']=='empleado'){
            $viewBag=[];
            $viewBag['nombre']=$_SESSION['mail'];
            $viewBag['rol']=$_SESSION['rol'];
            $this->render("panel.php",$viewBag);
        }
        else{
            echo "<script>alert('No tienes permisos para acceder a esta pagina');</script>";
            echo "<script>window.location.href='".PATH."/Principal/index';</script>";
        }
    }

    //funcion para validar el inicio de sesion
    public function login_usuario(){
        $viewBag=[];
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $errores = array();
            $mail=$_POST['email'];
            $password=$_POST['password'];
            $rol=$this->model->login($mail,$password);
           if(empty($rol)){
            array_push($errores,"El correo o la contraseña son incorrectos.");
            $viewBag['errores']=$errores;
            $viewBag['email']=$mail;
            $viewBag['password']=$password;
            $this->render("login.php",$viewBag);
           }
           elseif($rol=='administrador'){
            $_SESSION['mail']=$mail;
            $_SESSION['rol']=$rol;
            header('location:'.PATH.'/Usuarios/panel');
           }
           elseif($rol=='empleado'){
            $_SESSION['mail']=$mail;
            $_SESSION['rol']=$rol;
            header('location:'.PATH.'/Usuarios/panel');
           }
        }
    }


    //funcion para cerrar sesion
    public function logout(){
        unset($_SESSION['mail']);
        unset($_SESSION['rol']);
        $_SESSION=array();
        header('location:'.PATH.'/Usuarios/login');
    }

    public function register(){
        //verifica si la sesion esta iniciada 
        if(empty($_SESSION['rol'])){
            header('location:'.PATH.'/Usuarios/login');
        }
        //verifica si el rol es administrador
        if($_SESSION['rol']=='administrador'){
            $viewBag=[];
            $this->render("register.php",$viewBag);
        }
        else{
            echo "<script>alert('No tienes permisos para acceder a esta pagina');</script>";
            echo "<script>window.location.href='".PATH."/Usuarios/panel';</script>";
        }
    }

    public function index(){
        //verifica si la sesion esta iniciada 
        if(empty($_SESSION['rol'])){
            header('location:'.PATH.'/Usuarios/login');
        }
        //verifica si el rol es administrador
        if($_SESSION['rol']=='administrador'){
            $viewBag=[];
            $viewBag['usuarios']=$this->model->getEmpleados();
            $this->render("UsuariosAdmin.php",$viewBag);
        }
        else{
            echo "<script>alert('No tienes permisos para acceder a esta pagina');</script>";
            echo "<script>window.location.href='".PATH."/Usuarios/panel';</script>";
        }
    }

    public function insert(){
        $viewBag=[];
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $errores = array();
            $rol ='';
            if($_POST['rol'] == 'admintwde2518'){
                $rol = 'administrador';
            }
            else if($_POST['rol'] == 'empdrla2116'){
                $rol = 'empleado';
            }
            else {
                array_push($errores, "El codigo no es valido.");
            }
            $usuarios = [
                'nombre'=>$_POST['nombre'],
                'email'=>$_POST['email'],
                'password'=>$_POST['password'],
                'rol'=>$rol,
                'estado'=>'1'
            ];           
       // Validar errores antes de registrar
        if (count($errores) == 0) {
        if ($this->model->registrarUsuario($usuarios)) {
            header('location:' . PATH . '/Usuarios/register');
            exit;
        } else {
            array_push($errores, "El correo ya fue registrado, por favor ingrese otro.");
        }
    }

    // Si hay errores, renderizar la vista con los errores
    $viewBag['errores'] = $errores;
    $viewBag['usuarios'] = $usuarios; // Mantener los datos del formulario
    $this->render("register.php", $viewBag);
    }
 }

 //funcion para eliminar un usuario
    public function delete($params){
        $nombre=$params[0];
        $this->model->delete($nombre);
        header('location:'.PATH.'/Usuarios/index');
    }

    //funcion para actualizar un usuario
    public function update($params){
        //verifica si la sesion esta iniciada 
        if(empty($_SESSION['rol'])){
            header('location:'.PATH.'/Usuarios/login');
        }
        //verifica si el rol es administrador
        if($_SESSION['rol']=='administrador'){
            $name=$params[0];//obtenemos el id del usuario a actualizar
            $viewBag=[];
            $viewBag['usuarios']=$this->model->get($name)[0];
            $this->render("EditarUser.php",$viewBag);
        }
        else{
            echo "<script>alert('No tienes permisos para acceder a esta pagina');</script>";
            echo "<script>window.location.href='".PATH."/Usuarios/panel';</script>";
        }
    }
    
    public function update_usuario(){
        $viewBag=[];
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $errores = array();
            $rol ='';
            if($_POST['rol'] == 'admintwde2518'){
                $rol = 'administrador';
            }
            else if($_POST['rol'] == 'empdrla2116'){
                $rol = 'empleado';
            }
            else {
                array_push($errores, "El codigo no es valido.");
            }
            $usuarios = [
                'nombre'=>$_POST['nombre'],
                'email'=>$_POST['email'],
                'password'=>$_POST['password'],
                'rol'=>$rol,
                'estado'=>$_POST['estado'],
            ]; 
            // Validar errores antes de actualizar
            if (count($errores) == 0) {
                if ($this->model->update($usuarios)) {
                    header('location:' . PATH . '/Usuarios/index');
                    exit;
                } else {
                    array_push($errores, "Error al actualizar el usuario.");
                }
            }
            // Si hay errores, renderizar la vista con los errores
            $viewBag['errores'] = $errores;
            $viewBag['usuarios'] = $usuarios; // Mantener los datos del formulario
            $this->render("EditarUser.php", $viewBag);
        }
    }
}
?>