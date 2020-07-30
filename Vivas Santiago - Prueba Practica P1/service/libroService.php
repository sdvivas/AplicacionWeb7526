<?php
    include 'mainService.php';

    class LibroService extends MainService{

        private $entityName = "LIBRO";

        function insert($titulo,$autor,$fechaPublicacion,$precio,$paginas){
            
            $stmt = $this->conex->prepare("INSERT INTO LIBRO (titulo, autor, fecha_publicacion,precio,paginas) VALUES (?,?,?,?,?)");
            $stmt->bind_param('sssdd', $titulo,$autor,$fechaPublicacion,$precio,$paginas);
            $stmt->execute();
            $stmt->close();
            $this->$conex->close();
        }
    
        function findAll(){
            return $this->findAll1($this->entityName);
        }
    
        function update($titulo,$autor,$fechaPublicacion,$precio,$paginas,$codigoLibro){
            
            $stmt = $this->$conex->prepare("UPDATE libro SET titulo = ?, autor = ?, fecha_publicacion = ?, precio = ?, paginas = ? WHERE codigo = ?");
            $stmt->bind_param('sssddi', $titulo,$autor,$fechaPublicacion,$precio,$paginas,$codigoLibro);
            $stmt->execute();
            $stmt->close();
        }
    
        function delete($codigoLibro){
            
            $stmt = $this->conex->prepare("DELETE FROM libro WHERE codigo = ?");
            $stmt->bind_param('i',$codigoLibro);
            $stmt->execute();
            $stmt->close();
        }
    
        function findByPk($codigoLibro){
            
            $result = $this->conex->query("SELECT * FROM libro WHERE codigo=".$codigoLibro);
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
                
            }else{
                return null;
            }
        }
    }

    
?> 