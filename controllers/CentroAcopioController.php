<?php
//class Genre
class CentroAcopio{
    //Listar en el API
    public function index(){
        //Obtener el listado del Modelo
        $CentroAcopio=new CentroAcopioModel();
        $response=$CentroAcopio->all();
        if(isset($response) && !empty($response)){

            $json=array(
                'status'=>200,
                'results'=>$response
            );
        }else{
            $json=array(
                'status'=>400,
                'results'=>"No hay registros"
            );
        }
        echo json_encode($json,
                http_response_code($json["status"])
            );
    }
    public function getForm($id){   
        //Instancia del modelo     
        $movie=new CentroAcopioModel();
        $json=array(
            'status'=>400,
            'results'=>"Solicitud sin identificador"
        );
        //Verificar párametro
        if(isset($id) && !empty($id) && $id!=='undefined' && $id!=='null'){
            //Acción del modelo a ejecutar
            $response=$movie->getForm($id);
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
    }
    public function get($id){
        
        $centroAcopio=new CentroAcopioModel();
        $response=$centroAcopio->get($id);
        $json=array(
            'status'=>200,
            'results'=>$response
        );
       echo json_encode($json,
        http_response_code($json["status"]));
        
    }
    
    public function getCentroAcopioById($param){
        $centroAcopio=new CentroAcopioModel();
        $response=$centroAcopio->getCentroAcopioById($param);
        //Si hay respuesta
        if(isset($response) && !empty($response)){
            //Armar el json
            $json=array(
                'status'=>200,
                'results'=>$response
            );
        }else{
            $json=array(
                'status'=>400,
                'results'=>"No hay registros"
            );
        }
        echo json_encode($json,
                http_response_code($json["status"])
            );
    }

    public function getCentroAcopioByAdministradorID($param){
        $centroAcopio=new CentroAcopioModel();
        $response=$centroAcopio->getCentroAcopioByAdministradorID($param);
        //Si hay respuesta
        if(isset($response) && !empty($response)){
            //Armar el json
            $json=array(
                'status'=>200,
                'results'=>$response
            );
        }else{
            $json=array(
                'status'=>400,
                'results'=>"No hay registros"
            );
        }
        echo json_encode($json,
                http_response_code($json["status"])
            );
    }
    public function create( ){
        $inputJSON=file_get_contents('php://input');
        $object = json_decode($inputJSON); 
        $genero=new CentroAcopioModel();
        $response=$genero->create($object);
        if(isset($response) && !empty($response)){
            $json=array(
                'status'=>200,
                'results'=>$response[0]
            );
        }else{
            $json=array(
                'status'=>400,
                'total'=>0,
                'results'=>"No hay registros"
            );
        }
        echo json_encode($json,
        http_response_code($json["status"]));
        
    }
    public function update()
    {
        //Obtener json enviado
        $inputJSON = file_get_contents('php://input');
        //Decodificar json
        $object = json_decode($inputJSON);
        //Instancia del modelo
        $movie = new CentroAcopioModel();
        //Acción del modelo a ejecutar
        $response = $movie->update($object);
        //Verificar respuesta
        if (isset($response) && !empty($response)) {
            $json = array(
                'status' => 200,
                'results' => "Centro de acopio actualizado"
            );
        } else {
            $json = array(
                'status' => 400,
                'results' => "No se actualizo el recurso"
            );
        }
        echo json_encode(
            $json,
            http_response_code($json["status"])
        );
}
}