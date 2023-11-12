<?php
class CentroAcopioModel
{
	public $enlace;
	public function __construct()
	{

		$this->enlace = new MySqlConnect();

	}
	public function all()
	{
		try {
			$vSql = "SELECT * FROM CentrosDeAcopio;";
			$vResultado = $this->enlace->ExecuteSQL($vSql);
			if (!empty($vResultado)) {
				foreach ($vResultado as &$element) {
					$element->Administrador = $this->getAdministrador($element->AdministradorID);

					$materialesModel = new MaterialModel();
					$element->Materiales = $materialesModel->getMaterialByCetroDeAcopio($element->ID);

				}
			}
			return $vResultado;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function get($id)
	{
		try {
			//Consulta sql
			$vSql = "SELECT * FROM CentrosDeAcopio where ID=$id";

			//Ejecutar la consulta
			$vResultado = $this->enlace->ExecuteSQL($vSql);

			if (!empty($vResultado)) {
				$vResultado = $vResultado[0];
				$vResultado->Administrador = $this->getAdministrador($vResultado->AdministradorID);

				$materialesModel = new MaterialModel();
				$vResultado->Materiales = $materialesModel->getMaterialByCetroDeAcopio($vResultado->ID);
			}

			// Retornar el objeto
			return $vResultado;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getAdministrador($administradorID)
	{
		$usuarioModel = new UsuarioModel();
		$administrador = $usuarioModel->get($administradorID);
		if (!empty($administrador)) {
			return $administrador[0];
		} else {
			return null;
		}
	}


	public function getMaterialMovie($idMovie)
	{
		try {
			//Consulta sql
			$vSql = "SELECT g.id,g.title 
            FROM Material g,movie_Material mg 
            where mg.Material_id=g.id and mg.movie_id=$idMovie";

			//Ejecutar la consulta
			$vResultado = $this->enlace->ExecuteSQL($vSql);
			// Retornar el objeto
			return $vResultado;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function getMoviesbyMaterial($param)
	{
		try {
			$vResultado = null;
			if (!empty($param)) {
				$vSql = "SELECT m.id, m.lang, m.time, m.title, m.year
				FROM movie_Material mg, movie m
				where mg.movie_id=m.id and mg.Material_id=$param";
				$vResultado = $this->enlace->ExecuteSQL($vSql);
			}
			// Retornar el objeto
			return $vResultado;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function create($objeto)
	{
		try {
			// Crear el centro de acopio
			$vSqlCentroAcopio = "INSERT INTO CentrosDeAcopio (Nombre, DireccionProvincia, DireccionCanton, DireccionDistrito, DireccionExacta, Telefono, HorarioAtencion, AdministradorID) VALUES ('$objeto->Nombre', '$objeto->DireccionProvincia', '$objeto->DireccionCanton', '$objeto->DireccionDistrito', '$objeto->DireccionExacta', '$objeto->Telefono', '$objeto->HorarioAtencion', $objeto->AdministradorID)";
			
	
			// Obtener el ID del centro de acopio recién creado
			$centroAcopioID = $this->enlace->executeSQL_DML_last($vSqlCentroAcopio);
	
			// Asociar materiales al centro de acopio
			foreach ($objeto->Materiales as $material) {
				$vSqlAsociacion = "INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES ($centroAcopioID, $material->ID)";
				$this->enlace->executeSQL_DML($vSqlAsociacion);
			}
	
			// Retornar el objeto creado (puedes adaptar esto según tus necesidades)
			return $this->get($centroAcopioID);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	

	public function update($objeto)
	{
		try {
			//Consulta sql
			$vSql = "Update Material SET title ='$objeto->title' Where id=$objeto->id";

			//Ejecutar la consulta
			$vResultado = $this->enlace->executeSQL_DML($vSql);
			// Retornar el objeto actualizado
			return $this->get($objeto->id);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}