<?php
require_once 'Model.php';
class Editorialesmodel extends Model{
    public function get($id=''){
        if($id==''){
            $query="SELECT * FROM editoriales";
            return$this->get_query($query);
        }
        else{
            $query="SELECT * FROM editoriales where codigo_editorial=:codigo";
            return $this->get_query( $query,[':codigo'=>$id] );
        }
       
    }

    public function insert($editorial=array()){
        $query= "INSERT INTO editoriales VALUES (:codigo_editorial, :nombre_editorial, :contacto, :telefono)";
        return $this->set_query($query,$editorial);
    }

    public function delete($id=''){
        $query="DELETE FROM editoriales WHERE codigo_editorial=:codigo_editorial";
        return $this->set_query($query,['codigo_editorial'=>$id] );
    }

    public function update($editorial=array()){
        $query="UPDATE editoriales SET nombre_editorial=:nombre_editorial, contacto=:contacto, telefono=:telefono WHERE codigo_editorial=:codigo_editorial";
        return $this->set_query($query,$editorial);
    }
}