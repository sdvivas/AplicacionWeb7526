<?php
    
include 'conexion.php';
    
class MainService {
    public $conex;  
    function __construct() {
        $connection = new Connection();
        $this->conex = $connection->getConnection();
    }

    function findActive($sql){
        return $this->conex->query("SELECT * FROM $sql WHERE ESTADO LIKE 'ACT'");
    }
}
?>

