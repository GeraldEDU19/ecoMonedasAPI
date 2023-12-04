<?php
class CanjesMaterialesModel
{
    public $enlace;
    public function __construct()
    {

        $this->enlace = new MySqlConnect();

    }
    public function all()
    {
        try {
            //Consulta sql
            $vSql = "SELECT * FROM CanjesMateriales;";

            //Ejecutar la consulta
            $vResultado = $this->enlace->ExecuteSQL($vSql);

            if (!empty($vResultado))
                foreach ($vResultado as &$element)
                    $element = $this->setDetailCanjesMateriales($element);
            else {
                $vResultado = [];
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
            $vSql = "SELECT * FROM CanjesMateriales where id=$id";

            //Ejecutar la consulta
            $vResultado = $this->enlace->ExecuteSQL($vSql);

            $vResultado = $this->setDetailCanjesMateriales($vResultado[0]);
            // Retornar el objeto
            return $vResultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getByClienteID($ClienteID)
    {
        try {
            //Consulta sql
            $vSql = "SELECT * FROM CanjesMateriales where ClienteID=$ClienteID";

            //Ejecutar la consulta
            $vResultado = $this->enlace->ExecuteSQL($vSql);

            if (!empty($vResultado))
                foreach ($vResultado as &$element)
                    $element = $this->setDetailCanjesMateriales($element);
            else {
                $vResultado = [];
            }
            // Retornar el objeto
            return $vResultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function getByAdministradorID($AdministradorID)
    {
        try {
            //Consulta sql
            $vSql =
                "SELECT CanjesMateriales.*
                FROM CanjesMateriales
                JOIN CentrosDeAcopio ON CanjesMateriales.CentroDeAcopioID = CentrosDeAcopio.ID
                WHERE CentrosDeAcopio.AdministradorID = $AdministradorID;
                ";

            //Ejecutar la consulta
            $vResultado = $this->enlace->ExecuteSQL($vSql);

            if (!empty($vResultado))
                foreach ($vResultado as &$element)
                    $element = $this->setDetailCanjesMateriales($element);
            else {
                $vResultado = [];
            }
            return $vResultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function setDetailCanjesMateriales($canjeMateriales)
    {

        $usuarioModel = new UsuarioModel();
        $canjeMateriales->Cliente = ($usuarioModel->get($canjeMateriales->ClienteID))[0];

        $centroAcopio = new CentroAcopioModel();
        $canjeMateriales->CentroDeAcopio = $centroAcopio->get($canjeMateriales->CentroDeAcopioID);


        $detalleCanjesMaterialesModel = new DetalleCanjesMaterialesModel();
        $canjeMateriales->Detalles = $detalleCanjesMaterialesModel->getDetalleByCanjeMateriales($canjeMateriales->ID);


        return $canjeMateriales;

    }




    public function createCanje($objeto)
{
    try {
        // Consulta para crear el registro de canje de materiales
        $sqlCanje = "INSERT INTO CanjesMateriales (ClienteID, CentroDeAcopioID, FechaCanje, TotalEcoMonedas) 
            VALUES ('$objeto->Cliente', '$objeto->CentroDeAcopio', NOW(), '$objeto->total')";
        
        // Ejecutar la consulta para el registro de canje de materiales
        // Obtener el ID del canje
        $idCanje = $this->enlace->executeSQL_DML_last($sqlCanje);

        // Insertar los detalles del canje de materiales
        if ($idCanje) {
            foreach ($objeto->Detalles->materiales as $material) {
                $detalleCanjeSQL = "INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas) 
                                    VALUES ('$idCanje', '$material->material', '$material->cantidad', '$material->subTotalEcoMonedas')";
                $this->enlace->executeSQL_DML($detalleCanjeSQL);
            }
        }

        // Devolver el ID del canje de materiales creado
        return $idCanje;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


}