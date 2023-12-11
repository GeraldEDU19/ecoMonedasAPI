<?php
//Clase Controlador Pelicula
require_once "vendor/autoload.php";
use Firebase\JWT\JWT;
class Usuario
{
    private $secret_key = 'e0d17975bc9bd57eee132eecb6da6f11048e8a88506cc3bffc7249078cf2a77a';
    //GET Listar 
    public function index()
    {
        
        //Instancia del modelo
        $usuario = new UsuarioModel();
        //Acción del modelo a ejecutar
        $response = $usuario->all();
        if (isset($response) && !empty($response)) {
            $json = array(
                'status' => 200,
                'results' => $response
            );
        } else {
            $json = array(
                'status' => 400,
                'results' => "No hay registros"
            );
        }
        //Escribir respuesta JSON con código de estado HTTP
        echo json_encode(
            $json,
            http_response_code($json["status"])
        );
    }

    public function getAllAdministradores($ID)
    {
        //Instancia del modelo
        $usuario = new UsuarioModel();
        //Acción del modelo a ejecutar
        $response = $usuario->getAllAdministradores($ID);
        if (isset($response) && !empty($response)) {
            $json = array(
                'status' => 200,
                'results' => $response
            );
        } else {
            $json = array(
                'status' => 400,
                'results' => "No hay registros"
            );
        }
        echo json_encode(
            $json,
            http_response_code($json["status"])
        );
    }

    public function getAllClientes($ID)
    {
        //Instancia del modelo
        $usuario = new UsuarioModel();
        //Acción del modelo a ejecutar
        $response = $usuario->getAllClientes($ID);
        if (isset($response) && !empty($response)) {
            $json = array(
                'status' => 200,
                'results' => $response
            );
        } else {
            $json = array(
                'status' => 400,
                'results' => "No hay registros"
            );
        }
        echo json_encode(
            $json,
            http_response_code($json["status"])
        );
    }

    public function getAllAdministradoresSinCentro($ID)
    {
        //Instancia del modelo
        $usuario = new UsuarioModel();
        //Acción del modelo a ejecutar
        $response = $usuario->getAllAdministradoresSinCentro($ID);
        if (isset($response) && !empty($response)) {
            $json = array(
                'status' => 200,
                'results' => $response
            );
        } else {
            $json = array(
                'status' => 400,
                'results' => "No hay registros"
            );
        }
        echo json_encode(
            $json,
            http_response_code($json["status"])
        );
    }


    //GET Obtener 
    public function get($id)
    {
        //Instancia del modelo
        $usuario = new UsuarioModel();
        //Acción del modelo a ejecutar
        $response = $usuario->get($id);
        //Verificar respuesta
        if (isset($response) && !empty($response)) {
            //Armar el JSON respuesta satisfactoria
            $json = array(
                'status' => 200,
                'results' => $response
            );
        } else {
            //JSON respuesta negativa
            $json = array(
                'status' => 400,
                'results' => "No existe el recurso solicitado"
            );
        }
        //Escribir respuesta JSON con código de estado HTTP
        echo json_encode(
            $json,
            http_response_code($json["status"])
        );
    }
    //GET Obtener con formato para formulario
    public function getForm($id){   
        //Instancia del modelo     
        $rol=new RolModel();
        $json=array(
            'status'=>400,
            'results'=>"Solicitud sin identificador"
        );
        //Verificar párametro
        if(isset($id) && !empty($id) && $id!=='undefined' && $id!=='null'){
            //Acción del modelo a ejecutar
            $response=$rol->get($id);
            //Verificar respuesta
            if(isset($response) && !empty($response)){
                //Armar el json
                $json=array(
                    'status'=>200,
                    'results'=>$response
                );
            }else{
                $json=array(
                    'status'=>400,
                    'results'=>"No existe el recurso solicitado"
                );
            }
           
        }
        //Escribir respuesta JSON con código de estado HTTP
        echo json_encode($json,
            http_response_code($json["status"])
        ); 
    }
    //POST Crear
    public function login()
    {
        try {
            $inputJSON = file_get_contents('php://input');
            $object = json_decode($inputJSON);

            if (!is_object($object)) {
                throw new Exception("Invalid JSON data");
            }

            $usuario = new UsuarioModel();
            $response = $usuario->login($object);

            

            if ($response !== false && isset($response[0]) && is_object($response[0])) {
                $rolModel = new RolModel();
                $rol = ($rolModel->get($response[0]->RolId))[0];


                $data = [
                    'ID' => $response[0]->ID,
                    'CorreoElectronico' => $response[0]->CorreoElectronico,
                    'RolId' => $response[0]->RolId,
                    'PrimerNombre' => $response[0]->PrimerNombre,
                    'SegundoNombre' => $response[0]->SegundoNombre,
                    'PrimerApellido' => $response[0]->PrimerApellido,
                    'SegundoApellido' => $response[0]->SegundoApellido,
                    'Identificacion' => $response[0]->Identificacion,
                    'DireccionProvincia' => $response[0]->DireccionProvincia,
                    'DireccionCanton' => $response[0]->DireccionCanton,
                    'DireccionDistrito' => $response[0]->DireccionDistrito,
                    'Telefono' => $response[0]->Telefono,
                    'Rol' => $rol->Nombre
                ];

                $jwt_token = JWT::encode($data, $this->secret_key, 'HS256');

                $json = [
                    'status' => 200,
                    'results' => $jwt_token,
                ];
            } else {
                $json = [
                    'status' => 200,
                    'results' => "Usuario no válido",
                ];
            }

            echo json_encode($json, http_response_code($json["status"]));

        } catch (Exception $e) {
            $json = [
                'status' => 500,
                'results' => "Error interno del servidor: " . $e->getMessage(),
            ];
            echo json_encode($json, http_response_code($json["status"]));
        }
    }
    public function create( ){
        $inputJSON=file_get_contents('php://input');
        $object = json_decode($inputJSON); 
        $usuario=new UsuarioModel();
        $response=$usuario->create($object);
        if(isset($response) && !empty($response)){
            $json=array(
                'status'=>200,
                'results'=>$response
            );
        }else{
            $json=array(
                'status'=>400,
                'results'=>"Usuario No creado"
            );
        }
        echo json_encode($json,
        http_response_code($json["status"]));
    }

    public function changePassword(){
        $inputJSON=file_get_contents('php://input');
        $object = json_decode($inputJSON); 
        $usuario=new UsuarioModel();
        $response=$usuario->changePassword($object);
        if(isset($response)){
            $json=array(
                'status'=>200,
                'results'=>$response
            );
        }else{
            $json=array(
                'status'=>400,
                'results'=>"Usuario No creado"
            );
        }
        echo json_encode($json,
        http_response_code($json["status"]));
    }


    public function autorize(){
        
        try {
            
            $token = null;
            $headers = apache_request_headers();
            if(isset($headers['Authentication'])){
              $matches = array();
              preg_match('/Bearer\s(\S+)/', $headers['Authentication'], $matches);
              if(isset($matches[1])){
                $token = $matches[1];
                return true;
              }
            } 
            return false;
                   
        } catch (Exception $e) {
            return false;
        }
    }
}
