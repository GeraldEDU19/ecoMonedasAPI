<?php
class CanjesMaterialesModel{
    public $enlace;
    public function __construct() {
        
        $this->enlace=new MySqlConnect();
       
    }
    public function all(){
        try {
            //Consulta sql
			$vSql = "SELECT * FROM CanjesMateriales;";
			
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
			$vSql = "SELECT * FROM CanjesMateriales where id=$id";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->ExecuteSQL ( $vSql);

            $vResultado = $this->setDetailCanjesMateriales($vResultado[0]);
			// Retornar el objeto
			return $vResultado;
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }

    public function setDetailCanjesMateriales($canjeMateriales){

        $usuarioModel = new UsuarioModel();
        $canjeMateriales->Cliente = $usuarioModel->get($canjeMateriales->ClienteID);

        $centroAcopio = new CentroAcopioModel();
        $canjeMateriales->CentroDeAcopio = $centroAcopio->get($canjeMateriales->CentroDeAcopioID);


        $detalleCanjesMaterialesModel = new DetalleCanjesMaterialesModel();
        $canjeMateriales->detalles = $detalleCanjesMaterialesModel->getDetalleByCanjeMateriales($canjeMateriales->ID);


        return $canjeMateriales;

    }



 
	public function create($objeto) {
        try {
            //Consulta sql
            //Identificador autoincrementable
            
			$vSql = "Insert into genre (title) Values ('$objeto->title')";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->executeSQL_DML_last( $vSql);
			// Retornar el objeto creado
            return $this->get($vResultado);
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }
    public function update($objeto) {
        try {
            //Consulta sql
			$vSql = "Update genre SET title ='$objeto->title' Where id=$objeto->id";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->executeSQL_DML( $vSql);
			// Retornar el objeto actualizado
            return $this->get($objeto->id);
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }
}