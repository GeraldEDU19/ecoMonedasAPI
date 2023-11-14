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

	public function getForm($id)
	{
		try {
			$materialM = new MaterialModel();
			//Consulta sql
			$vSql = "SELECT * FROM CentrosDeAcopio WHERE id=$id";

			//Ejecutar la consulta
			$vResultado = $this->enlace->ExecuteSQL($vSql);
			$vResultado = $vResultado[0];

			//Lista de materiales del centro de acopio
			$materiales = $materialM->getMaterialCentroAcopioForm($id);

			//Array con el id de los materiales
			if (!empty($materiales)) {
				$materiales = array_column($materiales, 'ID');
			} else {
				$materiales = [];
			}

			//Propiedad que se va a agregar al objeto
			$vResultado->Materiales = $materiales;

			//Obtener información del administrador
			$adminModel = new UsuarioModel();
			$administrador = $adminModel->get($vResultado->ID);

			//Propiedad que se va a agregar al objeto
			$vResultado->Administrador = $administrador;

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
			// Consulta sql para la actualización
			$sql = "UPDATE CentrosDeAcopio SET 
            Nombre ='$objeto->Nombre',
            DireccionProvincia ='$objeto->DireccionProvincia',
            DireccionCanton ='$objeto->DireccionCanton',
            DireccionDistrito ='$objeto->DireccionDistrito',
            DireccionExacta ='$objeto->DireccionExacta',
            Telefono ='$objeto->Telefono',
            HorarioAtencion ='$objeto->HorarioAtencion',
            AdministradorID =$objeto->AdministradorID
            WHERE id=$objeto->ID";

			// Ejecutar la consulta de actualización
			$cResults = $this->enlace->executeSQL_DML($sql);

			// --- Materiales ---
			// Borrar materiales existentes asignados
			$sql = "DELETE FROM MaterialesCentroAcopio WHERE CentroDeAcopioID=$objeto->ID";
			$cResults = $this->enlace->executeSQL_DML($sql);

			// Crear elementos a insertar en materiales
			foreach ($objeto->Materiales as $material) {
				$dataMateriales[] = array($objeto->ID, $material->ID);
			}

			foreach ($dataMateriales as $row) {
				$valores = implode(',', $row);
				$sql = "INSERT INTO MaterialesCentroAcopio(CentroDeAcopioID, MaterialID) VALUES(" . $valores . ");";
				$vResultado = $this->enlace->executeSQL_DML($sql);
			}

			// Consulta para obtener el centro de acopio actualizado
			$updatedCentroAcopio = $this->get($objeto->ID);

			// Retornar el centro de acopio actualizado
			return $updatedCentroAcopio;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getCentroAcopioById($id)
	{
		try {
			$result = null;
			if (!empty($id)) {
				$sql = "SELECT id, Nombre, DireccionProvincia, DireccionCanton, DireccionDistrito, DireccionExacta, Telefono, HorarioAtencion, AdministradorID FROM CentrosDeAcopio WHERE id = $id";
				$result = $this->enlace->executeSQL_DML($sql);
			}
			// Retornar el objeto
			return $result;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


}