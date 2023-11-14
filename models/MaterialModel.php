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
	public function create($objeto, $imagen) {
		try {
			$sigID = $this->obtenerSiguienteAutoincrementable();
			$imagenName = "Materiales_" . $sigID;
	
			// Obtiene la extensión de la imagen
			$extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
	
			// Agrega la extensión al nombre de la imagen
			$imagenNameWithExtension = $imagenName . '.' . $extension;
	
			$imagenUploaded = $this->uploadImagen($imagen, $imagenNameWithExtension);
			if ($imagenUploaded == false) {
				throw new Error("Hubo un problema al subir la imagen");
			}
	
			$vSql = "INSERT INTO Materiales (Nombre, Tipo, Descripcion, Imagen, UnidadMedida, Color, Precio) VALUES ('" .
				$objeto['Nombre'] . "','" .
				$objeto['Tipo'] . "','" .
				$objeto['Descripcion'] . "','" .
				$imagenNameWithExtension . "','" .
				$objeto['UnidadMedida'] . "','" .
				$objeto['Color'] . "','" .
				$objeto['Precio'] . "')";
	
			$vResultado = $this->enlace->executeSQL_DML_last($vSql);
	
			return $vResultado;
	
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function getMaterialCentroAcopioForm($idCentroAcopio)
{
    try {
        //Consulta SQL
        $vSQL = "SELECT mc.MaterialID, m.Nombre, m.Tipo, m.Descripcion, m.Imagen, m.UnidadMedida, m.Color, m.Precio".
                " FROM MaterialesCentroAcopio mc, Materiales m".
                " WHERE mc.MaterialID = m.ID AND mc.CentroDeAcopioID = $idCentroAcopio;";

        //Ejecutar la consulta
        $vResultado = $this->enlace->executeSQL($vSQL);
        
        //Retornar el resultado
        return $vResultado;
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


	public function uploadImagen($imagen, $imagenName) {
			$fileTmpPath = $imagen['tmp_name'];

            $destination = __DIR__ . '/../assets/material_images/'.$imagenName;

            return move_uploaded_file($fileTmpPath, $destination);
	}

	public function obtenerSiguienteAutoincrementable() {
		$vSql = "SHOW TABLE STATUS LIKE 'Materiales'";
		$resultado = $this->enlace->ExecuteSQL($vSql);
	
		if ($resultado && is_array($resultado) && count($resultado) > 0) {
			// Asegurémonos de que $resultado es un array y tiene al menos un elemento
			$fila = $resultado[0];
			$numAutoIncrement = $fila->Auto_increment;
			return $numAutoIncrement ; // Accede a la propiedad como un objeto
		} else {
			throw new Exception("Hubo un error con el autoIncrementable");
		}
	}
	
	
	
	


	
}