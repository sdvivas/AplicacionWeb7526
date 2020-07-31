<?php
    include 'mainService.php';

    class ModuloService extends MainService{

        private $entityName = "SEG_MODULO";

        function insert($codigo,$nombre,$estado){
            
            $stmt = $this->conex->prepare("INSERT INTO SEG_MODULO VALUES (?,?,?)");
            $stmt->bind_param('sss', $codigo,$nombre,$estado);
            $stmt->execute();
            $stmt->close();
            
        }
    
        function findAll(){
            return $this->findActive($this->entityName);
        }
    
        function update($codigo,$nombre,$estado){
            
            $stmt = $this->conex->prepare("UPDATE SEG_MODULO SET NOMBRE = ?, ESTADO = ? WHERE COD_MODULO = ?");
            $stmt->bind_param('sss', $nombre,$estado,$codigo);
            $stmt->execute();
            $stmt->close();
        }
    
        function delete($codigo){
            
            $stmt = $this->conex->prepare("UPDATE SEG_MODULO SET ESTADO = 'INA' WHERE COD_MODULO = ?");
            $stmt->bind_param('s',$codigo);
            $stmt->execute();
            $stmt->close();
        }
    
        function findByPk($codigoModulo){
            
            $result = $this->conex->query("SELECT * FROM SEG_MODULO WHERE COD_MODULO=".$codigoModulo);
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
                
            }else{
                return null;
            }
        }
    }

    
?> 