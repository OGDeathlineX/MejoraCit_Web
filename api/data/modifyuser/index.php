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
        $username = $data['username'];
        $sql = "UPDATE usuarios SET correo = '{$data['correo']}', password = '{$data['password']}', celular = '{$data['celular']}' WHERE username = '$username'";
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
     * @Código original por mi pana ZakiTheFoxo
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
     * @Código original por mi pana ZakiTheFoxo
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
     * @Código original por mi pana ZakiTheFoxo
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