<?php 

    class equipoModel extends Model {

        public function __construct() {

            parent::__construct();
            
        }

        public function get() {
            try {
                $consultaSQL = "SELECT * FROM equipo INNER JOIN pabellon ON pabellon_id = pabellon.id;";
    
                $pdo = $this->db->connect();
    
                $stmt = $pdo->prepare($consultaSQL);
                $stmt->setFetchMode(PDO::FETCH_OBJ);
    
                $stmt->execute();
    
                $articulos = $stmt->fetchAll();
    
                return $articulos;
                
            } catch(PDOException $e) {
    
                $error = 'Error al leer registros '.$e->getMessage().' en la línea '.$e->getLine();
    
            }
        }


        public function getPabellon(){
            try{
                $consultaSQL = "SELECT * FROM pabellon ORDER BY id";
    
                $pdo = $this->db->connect();
    
                $pdoStmt = $pdo->prepare($consultaSQL);
                $pdoStmt->setFetchMode(PDO::FETCH_OBJ);
    
                $pdoStmt->execute();
                return $pdoStmt;
    
            }   catch(PDOException $e) {
        
                $error = 'Error al leer registros '.$e->getMessage().' en la línea '.$e->getLine();
    
            }
        }

        
        public function cabeceraTabla() {
            $cabecera = [
                "Id",
                "Nombre del Equipo",
                "Ciudad",
                "Pabellon asociado"
            ];

            return $cabecera;
        }

    }
?>  