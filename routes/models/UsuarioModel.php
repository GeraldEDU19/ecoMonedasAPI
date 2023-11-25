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

    
    public function login($objeto) {
        try {
            
			$vSql = "SELECT * from User where email='$objeto->email'";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->ExecuteSQL ( $vSql);
			if(is_object($vResultado[0])){
				$user=$vResultado[0];
				if(password_verify($objeto->password, $user->password))  
                    {
						return $this->get($user->id);
					}

			}else{
				return false;
			}
           
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }
    public function create($objeto) {
        try {
			if(isset($objeto->password)&& $objeto->password!=null){
				$crypt=password_hash($objeto->password, PASSWORD_BCRYPT);
				$objeto->password=$crypt;
			}
            //Consulta sql            
			$vSql = "Insert into Usuarios (name,email,password,rol_id)".
			" Values ('$objeto->name','$objeto->email','$objeto->password',$objeto->rol_id)";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->executeSQL_DML_last( $vSql);
			// Retornar el objeto creado
            return $this->get($vResultado);
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }
    
	
}