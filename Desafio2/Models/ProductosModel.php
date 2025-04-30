<?php
require_once 'Model.php';
class ProductosModel extends Model{
    //Este método se encarga de obtener las categorias de la base de datos
    //Este método se encarga de obtener un producto en la base de datos
    public function get($id=''){
        if($id==''){
            $query= "SELECT * FROM productos";
            return $this->get_query($query);
        }else{
            $query= "SELECT * FROM productos WHERE codigo_productos=:codigo";
            return $this->get_query($query,['codigo'=>$id]);
        }
    }
    //Este método se encarga de insertar un producto en la base de datos
    public function insert($productos=array()){
        $query="INSERT INTO productos(codigo_productos,nombre,descripcion,imagen,categoria_id,precio,existencias) 
        VALUES(:codigo_productos,:nombre,:descripcion,:imagen,:categoria_id,:precio,:existencias)";
        return $this->set_query($query,$productos);
    }

    //Este método se encarga de eliminar un producto en la base de datos
    public function delete($id=''){
        $query="DELETE FROM productos WHERE codigo_productos=:codigo_productos";
        return $this->set_query($query,['codigo_productos'=>$id]);
    }

public function update($productos=array()){
        $query="UPDATE productos SET nombre=:nombre,descripcion=:descripcion,imagen=:imagen,categoria_id=:categoria_id,precio=:precio,existencias=:existencias WHERE codigo_productos=:codigo_productos";
        return $this->set_query($query,$productos);
    }

    
}

?>