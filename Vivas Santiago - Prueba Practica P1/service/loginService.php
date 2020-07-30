<?php
    include 'mainService.php';
    Class  LoginService extends MainService{
        
        function login($userName,$password){
            $result = $this->conex->query("SELECT * FROM USUARIO WHERE USERNAME= '$userName'");
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if($row['PASSWORD'] == $password){
                    return $row;             
                }else{
                } 
            }else{
                return null;
            }
                
            
        }
    }

?>