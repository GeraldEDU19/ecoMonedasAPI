<?php
class UsuarioModel{
    public $enlace;
    public function __construct() {
        
        $this->enlace=new MySqlConnect();
       
    }
    public function all(){
        try {
            //Consulta sql
			$vSql = "SELECT * FROM Usuarios;";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->ExecuteSQL ( $vSql);
				
			// Retornar el objeto
			return $vResultado;
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }

    public function get($id){
    try {   
            //Consulta sql
			$vSql = "SELECT * FROM Usuarios where ID=$id";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->ExecuteSQL ( $vSql);
			// Retornar el objeto
			return $vResultado;
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }

    public function getAllAdministradores($ID){
        try {   
                //Consulta sql
                $vSql = "SELECT Usuarios.*
                FROM Usuarios
                JOIN Roles ON Usuarios.RolId = Roles.id
                WHERE Roles.nombre = 'Administrador';";
                
                //Ejecutar la consulta
                $vResultado = $this->enlace->ExecuteSQL ( $vSql);
                // Retornar el objeto
                return $vResultado;
            } catch ( Exception $e ) {
                die ( $e->getMessage () );
            }
        }

    public function getRolUser($id){
        try {
            //Consulta sql
			$vSql = "SELECT r.id,r.name
            FROM rol r,user u 
            where r.id=u.Id and u.id=$id";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->ExecuteSQL ( $vSql);
			// Retornar el objeto
			return $vResultado[0];
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }

    public function create($objeto) {
        try {
            $sql = "INSERT INTO Roles (Nombre) VALUES ('$objeto->Nombre')";
    
            $idRol = $this->enlace->executeSQL_DML_last($sql);
    
            return $this->get($idRol);
        } catch (Exception $e) {
            if (strpos($e->getMessage(), "Duplicate entry") !== false) {
                // Verificar si el error es debido a la duplicación del campo "Nombre"
                die("El Nombre del Rol ya existe. Por favor, elija un Nombre único.");
            } else {
                die($e->getMessage());
            }
        }
    }
    
	
}