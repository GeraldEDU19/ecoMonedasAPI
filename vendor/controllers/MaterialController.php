<?php
//class Genre
class material
{
    //Listar en el API
    public function index()
    {
        //Obtener el listado del Modelo
        $Material = new MaterialModel();
        $response = $Material->all();
        //Si hay respuesta
        if (isset($response) && !empty($response)) {
            //Armar el json
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
    public function get($param)
    {

        $Material = new MaterialModel();
        $response = $Material->get($param);
        $json = array(
            'status' => 200,
            'results' => $response
        );
        echo json_encode(
            $json,
            http_response_code($json["status"])
        );

    }


    public function create()
{
    $imagenDataExists = (isset($_FILES['Imagen']) && $_FILES['Imagen']['error'] === UPLOAD_ERR_OK);

    if (!$imagenDataExists) {
        $json = array(
            'status' => 400,
            'results' => "No se creó el recurso"
        );
        echo json_encode($json);
    } else {

        $material = new MaterialModel();
        
        $response = $material->create($_POST, $_FILES['Imagen']);

        
        if (isset($response) && !empty($response)) {
            $json = array(
                'status' => 200,
                'results' => $response
            );
        } else {
            $json = array(
                'status' => 400,
                'results' => "No se creó el recurso"
            );
        }
    }

    echo json_encode(
        $json,
        http_response_code($json["status"])
    );
}



}