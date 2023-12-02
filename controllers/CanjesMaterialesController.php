<?php
//class Genre
class CanjesMateriales{
    //Listar en el API
    public function index(){
        $canjeMaterialesModel=new CanjesMaterialesModel();
        $response=$canjeMaterialesModel->all();
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
    public function get($Id){
        
        $canjesMateriales =new CanjesMaterialesModel();
        $response=$canjesMateriales->get($Id);
        $json=array(
            'status'=>200,
            'results'=>$response
        );
       echo json_encode($json,
        http_response_code($json["status"]));
        
    }
    public function getByClienteID($ID){
        $canjesMateriales =new CanjesMaterialesModel();
        $response=$canjesMateriales->getByClienteID($ID);
        $json=array(
            'status'=>200,
            'results'=>$response
        );
       echo json_encode($json,
        http_response_code($json["status"])); 
    }


    public function getByAdministradorID($ID){
        $canjesMateriales =new CanjesMaterialesModel();
        $response=$canjesMateriales->getByAdministradorID($ID);
        $json=array(
            'status'=>200,
            'results'=>$response
        );
       echo json_encode($json,
        http_response_code($json["status"])); 
    }

    

    public function create() {
        $inputJSON = file_get_contents('php://input');
        $object = json_decode($inputJSON);

        $canje = new CanjesMaterialesModel();
        $response = $canje->createCanje($object);

        if (!empty($response)) {
            $json = array(
                'status' => 201,
                'results' => 'El canje ha sido creado'
            );
        } else {
            $json = array(
                'status' => 400,
                'results' => "No se creó el recurso"
            );
        }

        http_response_code($json["status"]);
        echo json_encode($json);
    }
    public function update(){
        $inputJSON=file_get_contents('php://input');
        $object = json_decode($inputJSON); 
        $genero=new GenreModel();
        $response=$genero->update($object);
        if(isset($response) && !empty($response)){
            $json=array(
                'status'=>200,
                'total'=>count($response),
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
}