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
            $vSql = "SELECT * FROM Usuarios where ID=$id";

            $vResultado = $this->enlace->ExecuteSQL ( $vSql);
            return $vResultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }

    public function getAllAdministradores($ID){
        try {   
                $vSql = "SELECT Usuarios.*
                FROM Usuarios
                JOIN Roles ON Usuarios.RolId = Roles.id
                WHERE Roles.nombre = 'Administrador';";
                $vResultado = $this->enlace->ExecuteSQL ( $vSql);
                return $vResultado;
            } catch ( Exception $e ) {
                die ( $e->getMessage () );
            }
        }

        public function getAllClientes($ID){
            try {   
                    $vSql = "SELECT Usuarios.*
                    FROM Usuarios
                    JOIN Roles ON Usuarios.RolId = Roles.id
                    WHERE Roles.nombre = 'Cliente';";
                    $vResultado = $this->enlace->ExecuteSQL ( $vSql);
                    return $vResultado;
                } catch ( Exception $e ) {
                    die ( $e->getMessage () );
                }
            }

        public function getAllAdministradoresSinCentro($ID){
            try {   
                    //Consulta sql
                    $vSql = "SELECT Usuarios.*
                    FROM Usuarios
                    JOIN Roles ON Usuarios.RolId = Roles.ID
                    WHERE Roles.Nombre = 'Administrador'
                    AND NOT EXISTS (
                        SELECT 1
                        FROM CentrosDeAcopio
                        WHERE CentrosDeAcopio.AdministradorID = Usuarios.ID
                    );";
                                        
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
            $correoElectronico = $objeto->CorreoElectronico;
            $vSql = "SELECT * FROM Usuarios WHERE CorreoElectronico='$correoElectronico'";
            $vResultado = $this->enlace->executeSQL($vSql);
    
            if (!empty($vResultado) && is_array($vResultado)) {
                $user = (object)$vResultado[0];

                if (isset($user->Contrasenna) && password_verify($objeto->Contrasenna, $user->Contrasenna)) {
                    return $this->get($user->ID);
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function create($objeto) {
        try {
            if(isset($objeto->Contrasenna)&& $objeto->Contrasenna!=null){
                $crypt=password_hash($objeto->Contrasenna, PASSWORD_BCRYPT);
                $objeto->Contrasenna=$crypt;
            }           
            $vSql = "Insert into Usuarios (CorreoElectronico, PrimerNombre, SegundoNombre, PrimerApellido, SegundoApellido, Identificacion, DireccionProvincia, DireccionCanton, DireccionDistrito, Telefono, Contrasenna, RolId)".
            " Values ('$objeto->CorreoElectronico','$objeto->PrimerNombre','$objeto->SegundoNombre','$objeto->PrimerApellido','$objeto->SegundoApellido','$objeto->Identificacion','$objeto->DireccionProvincia', '$objeto->DireccionCanton', '$objeto->DireccionDistrito', '$objeto->Telefono', '$objeto->Contrasenna', '$objeto->RolId')";

            $vResultado = $this->enlace->executeSQL_DML_last( $vSql);
            return $this->get($vResultado);
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }

    public function changePassword($objeto) {
        try {
            if(isset($objeto->Contrasenna)&& $objeto->Contrasenna!=null){
                $crypt=password_hash($objeto->Contrasenna, PASSWORD_BCRYPT);
                $objeto->Contrasenna=$crypt;
            }           
            $vSql = "UPDATE Usuarios SET Contrasenna = '$objeto->Contrasenna' WHERE ID = '$objeto->ID'";

            $vResultado = $this->enlace->executeSQL_DML( $vSql);
            return $this->get($vResultado);
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }


    
    
}

