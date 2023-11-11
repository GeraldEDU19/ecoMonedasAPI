<?php
class MaterialModel{
    public $enlace;
    public function __construct() {
        
        $this->enlace=new MySqlConnect();
       
    }
    public function all(){
        try {
            //Consulta sql
			$vSql = "SELECT * FROM Materiales;";
			
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
			$vSql = "SELECT * FROM Materiales where ID=$id";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->ExecuteSQL ( $vSql);
			// Retornar el objeto
			return $vResultado;
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }
    public function getMaterialByCetroDeAcopio($idCentroAcopio){
        try {
            //Consulta sql
			$vSql = "SELECT *
            FROM Materiales m,MaterialesCentroAcopio mca
            where mca.MaterialID=m.ID and mca.CentroDeAcopioID=$idCentroAcopio";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->ExecuteSQL ( $vSql);
			// Retornar el objeto
			return $vResultado;
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }
	public function create($objeto) {
		try {
			// Manually construct the query
			$vSql = "INSERT INTO Materiales (Nombre, Tipo, Descripcion, Imagen, UnidadMedida, Color, Precio) VALUES ('" . 
					$objeto->Nombre . "','" . 
					$objeto->Tipo . "','" . 
					$objeto->Descripcion . "','" . 
					$objeto->Imagen . "','" . 
					$objeto->UnidadMedida . "','" . 
					$objeto->Color . "','" . 
					$objeto->Precio . "')";

			$vResultado = $this->enlace->executeSQL_DML_last($vSql);

			return $this->get($vResultado);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
    public function update($objeto) {
        try {
            //Consulta sql
			$vSql = "Update Material SET title ='$objeto->title' Where id=$objeto->id";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->executeSQL_DML( $vSql);
			// Retornar el objeto actualizado
            return $this->get($objeto->id);
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }


	
}