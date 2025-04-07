 <?php
abstract class ModelAutores{
    private $host='localhost';   //sql202.infinityfree.com
    private$user='root';                //if0_38183902
    private $password= '';             //Q2aTj0TrwG
    private $db_name= 'inventario_libros'; //if0_38183902_inventarios_libros
    protected $conn; //Para que las clases hijas puedan acceder a la conexion
    protected function open_db(){
        try{
            $this->conn=new PDO("mysql:host=$this->host;dbname=$this->db_name;charset=utf8",$this->user,$this->password);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    protected function close_db(){
        $this->conn=null;
    }

    protected function get_query($query,$params=array()){
        try{
            $rows=[];
            $this->open_db();
            $stm=$this->conn->prepare($query);
            $stm->execute($params);
            while($rows[]=$stm->fetch(PDO::FETCH_ASSOC));
            $this->close_db();
            array_pop($rows);//Quitar el ultimo elemento
            return $rows;
        }
        catch(Exception $e){
            $this->close_db();
            return [];
        }
    }

    protected function set_query($query,$params=array()){
        try{
            $this->open_db();
            $stm=$this->conn->prepare($query);
            $stm->execute($params);
            $affectedRows=$stm->rowCount();
            $this->close_db();
            return $affectedRows;
        }  
        catch(Exception $e){
            $this->close_db();
            return 0;
        }
    }
}
