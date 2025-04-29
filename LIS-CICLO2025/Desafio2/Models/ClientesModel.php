<?php
require_once 'Model.php'; 

class ClientesModel extends Model{

    public function get($id=''){
        if($id==''){
            $query= "SELECT * FROM clientes";
            return $this->get_query($query);
        }else{
            $query= "SELECT * FROM clientes WHERE codigo_cliente=:codigo_cliente";
            return $this->get_query($query,['codigo_cliente'=>$id]);
        }
    }

    //Este método se encarga de insertar un cliente en la base de datos
    public function insert($clientes=array()){
        $query="INSERT INTO clientes(codigo_cliente,nombre,email,password,telefono,estado) 
        VALUES(:codigo_cliente,:nombre,:email,:password,:telefono,:estado)";
        $clientes['password'] = password_hash($clientes['password'], PASSWORD_DEFAULT); // Encriptar la contraseña
        return $this->set_query($query,$clientes);
    }

    //Este método se encarga de eliminar un cliente en la base de datos
    public function delete($id=''){
        $query="DELETE FROM clientes WHERE codigo_cliente=:codigo_cliente";
        return $this->set_query($query,['codigo_cliente'=>$id]);
    }

    //Este método se encarga de actualizar un cliente en la base de datos
    public function update($clientes=array()){
        $query="UPDATE clientes SET nombre=:nombre,email=:email,password=:password,telefono=:telefono,estado=:estado WHERE codigo_cliente=:codigo_cliente";
        $clientes['password'] = password_hash($clientes['password'], PASSWORD_DEFAULT); // Encriptar la contraseña
        return $this->set_query($query,$clientes);
    }

    public function login($mail, $password){
        // Consulta para obtener la contraseña encriptada, estado y nombre del cliente
        $query = "SELECT password, estado, nombre FROM clientes WHERE email = :mail";
        $result = $this->get_query($query, ['mail' => $mail]);
    
        // Verificar si el cliente existe
        if (!empty($result)) {
            // Verificar la contraseña
            if (password_verify($password, $result[0]['password'])) {
                // Retornar estado y nombre si la contraseña es válida
                return [
                    'estado' => $result[0]['estado'],
                    'nombre' => $result[0]['nombre']                   
                ];
            }
        }   
        // Retornar null si no se encuentra el cliente o la contraseña es incorrecta
        return null;
    }

    //obtener codigo de cliente
    public function getCodigoCliente($id=''){
        $query = "SELECT codigo_cliente FROM clientes WHERE nombre = :nombre";
        return $this->get_query($query,['nombre'=>$id]);
    }

    //validar si el correo ya existe
    public function validarCorreo($mail){
    $query = "SELECT COUNT(*) as count FROM clientes WHERE email = :email";
    $result = $this->get_query($query, ['email' => $mail]);
    return $result[0]['count'] > 0; // Retorna true si el correo ya existe
   }
}
?>