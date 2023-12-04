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
			$vSql = "SELECT * FROM Material where id=$id";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->ExecuteSQL ( $vSql);
			// Retornar el objeto
			return $vResultado;
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }
    public function getMaterialMovie($idMovie){
        try {
            //Consulta sql
			$vSql = "SELECT g.id,g.title 
            FROM Material g,movie_Material mg 
            where mg.Material_id=g.id and mg.movie_id=$idMovie";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->ExecuteSQL ( $vSql);
			// Retornar el objeto
			return $vResultado;
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }
	public function getMoviesbyMaterial($param){
        try {
			$vResultado =null;
			if(!empty($param )){
				$vSql="SELECT m.id, m.lang, m.time, m.title, m.year
				FROM movie_Material mg, movie m
				where mg.movie_id=m.id and mg.Material_id=$param";
				$vResultado = $this->enlace->ExecuteSQL ( $vSql);
			}
			// Retornar el objeto
			return $vResultado;
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }
	public function create($objeto) {
		try {
            //Consulta sql
            //Identificador autoincrementable
            
			$vSql = "Insert into Material (Nombre, Tipo, Descripcion, Imagen, UnidadMedida, Color, Precio) Values ('$objeto->Nombre','$objeto->Tipo','$objeto->Imagen','$objeto-> UnidadMedida','$objeto->Color','$objeto->Precio')";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->executeSQL_DML_last( $vSql);
			$vResultado = $vSql;
			// Retornar el objeto creado
            return $this->get($vResultado);
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
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