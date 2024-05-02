<?php
    /*
     *
     * Funcion que registra un usuario en la base de datos (nombre de usuario, correo, contraseña y celular)
     * @param $data array con los datos del usuario
     * @param $mysqli conexion a la base de datos
     * @return boolean
     *
    */
    function modifyUser($data,$mysqli){
        $sql = "INSERT INTO usuarios (username, correo, password, celular) VALUES ('$data[username]','$data[correo]','$data[password]', '$data[celular]')";
        $result = $mysqli->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    /*
     *
     * Funcion que valida que no exista un usuario con el mismo nombre de usuario, si existe regresa false
     * @param $data array con los datos del usuario
     * @param $mysqli conexion a la base de datos
     * @return boolean
     *
    */
    function validateNonExistingUsername($data,$mysqli){
        $sql = "SELECT * FROM usuarios WHERE username = '$data[username]'";
        $result = $mysqli->query($sql);
        if($result->num_rows > 0){
            return false;
        }else{
            return true;
        }
    }

    /*
     *
     * Funcion que valida que no exista un usuario con el mismo correo, si existe regresa false
     * @param $data array con los datos del usuario
     * @param $mysqli conexion a la base de datos
     * @return boolean
     *
    */
    function validateNonExistingEmail($data,$mysqli){
        $sql = "SELECT * FROM usuarios WHERE correo = '$data[correo]'";
        $result = $mysqli->query($sql);
        if($result->num_rows > 0){
            return false;
        }else{
            return true;
        }
    }

    /*
     *
     * Funcion que valida que no exista un usuario con el mismo celular, si existe regresa false
     * @param $data array con los datos del usuario
     * @param $mysqli conexion a la base de datos
     * @return boolean
     *
    */
    function validateNonExistingCelular($data,$mysqli){
        $sql = "SELECT * FROM usuarios WHERE celular = '$data[celular]'";
        $result = $mysqli->query($sql);
        if($result->num_rows > 0){
            return false;
        }else{
            return true;
        }
    }