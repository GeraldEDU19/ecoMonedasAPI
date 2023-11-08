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
         //Obtener json enviado
         $inputJSON = file_get_contents('php://input');
         //Decodificar json
         $object = json_decode($inputJSON);
         //Instancia del modelo
         $material = new MaterialModel();
         //Acción del modelo a ejecutar
         $response = $material->create($object);
         //Verificar respuesta
         if (isset($response) && !empty($response)) {
             $json = array(
                 'status' => 200,
                 'results' => 'Material creado'
             );
         } else {
             $json = array(
                 'status' => 400,
                 'results' => "No se creo el recurso"
             );
         }
         //Escribir respuesta JSON con código de estado HTTP
         echo json_encode(
             $json,
             http_response_code($json["status"])
         );
       /*  if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            // Obtener los datos de la imagen
            $fileTmpPath = $_FILES['imagen']['tmp_name'];
            $fileName = $_FILES['imagen']['name'];

            // Obtener la extensión del archivo
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);

            // Definir la ruta de destino para guardar la imagen con el nombre 'test' y su extensión original
            $destination = __DIR__ . '/../assets/material_images/test.' . $extension;

            // Mover la imagen al directorio de destino
            if (move_uploaded_file($fileTmpPath, $destination)) {
                // Enviar una respuesta exitosa si se pudo guardar la imagen
                $json = array(
                    'status' => 200,
                    'results' => "Imagen guardada con éxito en: " . $destination
                );
                echo json_encode($json, http_response_code($json["status"]));
            } else {
                // Si hubo un problema al guardar la imagen, enviar una respuesta de error
                $json = array(
                    'status' => 400,
                    'results' => "Hubo un error al guardar la imagen."
                );
                echo json_encode($json, http_response_code($json["status"]));
            }
        } else {
            // Si no se envió una imagen o hubo un error, puedes enviar una respuesta de error
            $json = array(
                'status' => 400,
                'results' => "No se recibió ninguna imagen o hubo un error al procesarla."
            );

            echo json_encode($json, http_response_code($json["status"]));
        } */
    }


}