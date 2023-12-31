<?php
class DetalleCanjesMaterialesModel
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
            $vSql = "SELECT * FROM Materiales;";

            //Ejecutar la consulta
            $vResultado = $this->enlace->ExecuteSQL($vSql);

            // Retornar el objeto
            return $vResultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function get($id)
    {
        try {
            //Consulta sql
            $vSql = "SELECT * FROM Material where id=$id";

            //Ejecutar la consulta
            $vResultado = $this->enlace->ExecuteSQL($vSql);


            // Retornar el objeto
            return $vResultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function  getDetalleByCanjeMateriales($idCanjeMaterial)
    {
        try {
            $vSql = "SELECT *
            FROM DetalleCanjesMateriales 
            WHERE CanjeID = $idCanjeMaterial;
            ";

            $vResultado = $this->enlace->ExecuteSQL($vSql);
            if (!empty($vResultado)) foreach ($vResultado as &$element) $element = $this->setDetailDetalleCanjesMateriales($element);
            // Retornar el objeto
            return $vResultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function setDetailDetalleCanjesMateriales($detalleCanjeMaterial){

        $modelMaterial = new MaterialModel();
        $detalleCanjeMaterial->Material = $modelMaterial->get($detalleCanjeMaterial->MaterialID) ;

        return $detalleCanjeMaterial;
    }



    public function create($objeto)
    {
        try {
            //Consulta sql
            //Identificador autoincrementable

            $vSql = "Insert into Material (title) Values ('$objeto->title')";

            //Ejecutar la consulta
            $vResultado = $this->enlace->executeSQL_DML_last($vSql);
            // Retornar el objeto creado
            return $this->get($vResultado);
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