<?php
require_once 'Model.php'; 

class UsuariosModel extends Model{
    //Este método se encarga de obtener los usuarios de la base de datos
    public function get($id=''){
        if($id==''){
            $query= "SELECT * FROM usuarios";
            return $this->get_query($query);
        }else{
            $query= "SELECT * FROM usuarios WHERE nombre=:nombre";
            return $this->get_query($query,['nombre'=>$id]);
        }
    }

    
    public function getEmpleados() {
    $query = "SELECT * FROM usuarios WHERE rol = 'empleado'";
    return $this->get_query($query);
    }

    //funcion para registrar un usuario
    public function registrarUsuario($usuario=array()) {
        $query = "INSERT INTO usuarios(nombre, email, password, rol, estado)
                  VALUES(:nombre, :email, :password, :rol, :estado)";
        $usuario['password'] = password_hash($usuario['password'], PASSWORD_DEFAULT); // Encriptar la contraseña
        return $this->set_query($query, $usuario); // Pasar el array completo con la contraseña encriptada
    }

    //funcion para eliminar un usuario
    public function delete($id=''){
        $query="DELETE FROM usuarios WHERE nombre=:nombre";
        return $this->set_query($query,['nombre'=>$id]);
    }

    //funcion para actualizar un usuario
    public function update($usuario=array()){
        $query="UPDATE usuarios SET nombre=:nombre, password=:password, rol=:rol, estado=:estado WHERE nombre=:nombre";
        $usuario['password'] = password_hash($usuario['password'], PASSWORD_DEFAULT); // Encriptar la contraseña
        return $this->set_query($query,$usuario);
    }

    //funcion para iniciar sesion
    public function login($mail, $password){
       // Consulta para obtener la contraseña encriptada y el rol del usuario
    $query = "SELECT password, rol FROM usuarios WHERE email = :mail";
    $result = $this->get_query($query, ['mail' => $mail]);

    // Verificar la contraseña en una sola línea y devolver el rol si es válida
    return (!empty($result) && password_verify($password, $result[0]['password'])) ? $result[0]['rol'] : null;
    }
 }

?>