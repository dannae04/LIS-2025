<?php
require_once 'Models/Model.php';
class CategoriasModel extends Model{
    //Este método se encarga de obtener las categorias de la base de datos
    public function get($id=''){ 
       if($id==''){
            $query="SELECT * FROM categoria";
            return $this->get_query($query);
        }else{
            $query="SELECT * FROM categoria WHERE categoria_id=:categoria_id";
            return $this->get_query($query,['categoria_id'=>$id]);
        } 
    }
    //Este método se encarga de insertar una categoria en la base de datos
    public function insert($categorias=array()){
        $query="INSERT INTO categoria(categoria_id,nombre_categoria) 
        VALUES(:categoria_id,:nombre_categoria)";
        return $this->set_query($query,$categorias);
    }

    //Este método se encarga de eliminar una categoria en la base de datos
    public function delete($id=''){
        $query="DELETE FROM categoria WHERE categoria_id=:categoria_id";
        return $this->set_query($query,['categoria_id'=>$id]);
    }

    //Este método se encarga de actualizar una categoria en la base de datos
    public function update($categorias=array()){
        $query="UPDATE categoria SET nombre_categoria=:nombre_categoria WHERE categoria_id=:categoria_id";
        return $this->set_query($query,$categorias);
    }
}

?>