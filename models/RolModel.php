<?php
class RolModel{
    public $enlace;
    public function __construct() {
        
        $this->enlace=new MySqlConnect();
       
    }
    public function all(){
        try {
            //Consulta sql
			$vSql = "SELECT * FROM Roles;";
			
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
			$vSql = "SELECT * FROM Roles where Id=$id";
			
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
			$sql = "Insert into Roles (NombreRol)". 
                     "Values ('$objeto->NombreRol')";
			
			$idRol = $this->enlace->executeSQL_DML_last( $sql);

            return $this->get($idRol);
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }
	
}