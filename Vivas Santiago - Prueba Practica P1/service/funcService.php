<?php
    include 'mainService.php';

    class FuncService extends MainService{

        private $entityName = "SEG_FUNCIONALIDAD";

        function findModules(){
            return $this->findActive("SEG_MODULO");
        }
        
        function insert($codigoModulo,$url,$nombre,$descripcion){
            
            $stmt = $this->conex->prepare("INSERT INTO SEG_FUNCIONALIDAD VALUES (?,?,?,?)");
            $stmt->bind_param('ssss', $codigoModulo,$url,$nombre,$descripcion);
            $stmt->execute();
            $stmt->close();
            
        }
    
        function findByModules($codigoModulo){
            return $this->conex->query("SELECT * FROM SEG_FUNCIONALIDAD WHERE COD_MODULO LIKE '$codigoModulo'");
        }
    
        function update($codigoFunc,$url,$nombre,$descripcion){
            
            $stmt = $this->conex->prepare("UPDATE SEG_FUNCIONALIDAD SET URL_PRINCIPAL = ?, NOMBRE = ?, DESCRIPCION = ? WHERE COD_FUNCIONALIDAD = ?");
            $stmt->bind_param('sssi', $url,$nombre,$descripcion,$codigoFunc);
            $stmt->execute();
            $stmt->close();
        }
    
        function delete($codigo){
            
            $stmt = $this->conex->prepare("DELETE FROM SEG_FUNCIONALIDAD WHERE COD_FUNCIONALIDAD = ?");
            $stmt->bind_param('i',$codigo);
            $stmt->execute();
            $stmt->close();
        }
    
        function findByPk($codigo){
            
            $result = $this->conex->query("SELECT * FROM SEG_FUNCIONALIDAD WHERE COD_FUNCIONALIDAD=".$codigo);
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
                
            }else{
                return null;
            }
        }
    }

    
?> 