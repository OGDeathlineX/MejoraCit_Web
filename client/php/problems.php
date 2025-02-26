<?php
include '../../api/helper/helper.php';
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($data['folio']) 
        && isset($data['categoria'])
        && isset($data['estatus'])
        && isset($data['fecha_inicial'])
        && isset($data['descripcion'])
        && isset($data['imagen'])
        && isset($data['latitud'])
        && isset($data['longitud'])
        && isset($data['colonia'])
        && isset($data['calle'])
        && isset($data['id_usuario'])
    ) {

        $latitud = $mysqli->real_escape_string($data['latitud']);
        $longitud = $mysqli->real_escape_string($data['longitud']);
        $colonia = $mysqli->real_escape_string($data['colonia']);
        $calle = $mysqli->real_escape_string($data['calle']);

        $query_localizacion = "INSERT INTO localizacion (latitud, longitud, colonia, calle) 
                                VALUES ('$latitud', '$longitud', '$colonia', '$calle')";

        $result_localizacion = $mysqli->query($query_localizacion);

        if ($result_localizacion) {

            $id_locacion = $mysqli->insert_id;

            $folio = $mysqli->real_escape_string($data['folio']);
            $categoria = $mysqli->real_escape_string($data['categoria']);
            $estatus = $mysqli->real_escape_string($data['estatus']);
            $fecha_inicial = $mysqli->real_escape_string($data['fecha_inicial']);
            $descripcion = $mysqli->real_escape_string($data['descripcion']);
            $imagen = $mysqli->real_escape_string($data['imagen']);
            $id_usuario = $mysqli->real_escape_string($data['id_usuario']);

            $query_reporte = "INSERT INTO reporte (folio, categoria, estatus, fecha_inicial, descripcion, imagen, id_locacion, id_usuario) 
                                VALUES ('$folio', '$categoria', '$estatus', '$fecha_inicial', '$descripcion', '$imagen', '$id_locacion', '$id_usuario')";

            $result_reporte = $mysqli->query($query_reporte);

            if ($result_reporte) {
                echo '{"status":200,"message":"Registro exitoso"}';
            } else {
                echo '{"status":500,"message":"Error al insertar en la tabla reporte"}';
            }
        } else {
            echo '{"status":500,"message":"Error al insertar en la tabla localizacion"}';
        }
    } else {
        echo '{"status":400,"message":"Debes ingresar todos los datos"}';
    }
} else {
    echo '{"status":400,"message":"Método no válido"}';
}
?>
