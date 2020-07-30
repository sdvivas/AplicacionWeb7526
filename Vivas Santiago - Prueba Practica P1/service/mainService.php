<?php
    
include 'conexion.php';
    
class MainService {
    public $conex;  
    function __construct() {
        $connection = new Connection();
        $this->conex = $connection->getConnection();
    }

    function findAll1($sql){
        return $this->conex->query("SELECT * FROM ".$sql);
    }
}
?>

