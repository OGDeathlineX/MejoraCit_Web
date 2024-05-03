<?php
	/* Variables */
	$debug		=	true;
	
	/* Archivos base */
	include '../../helper/helper.php';
	include '../../data/register/index.php';

	/* Cuerpo del API */
	if($method=='POST'){
        if(isset($data)){
            // Valida que no exista el usuario, si existe regresa un error
            //@Código original por mi pana ZakiTheFoxo
            if(!validateNonExistingUsername($data,$mysqli)){
                echo '{"status":501,"description":"Usuario ya registrado"}';
                die();
            }

            // Valida que no exista el correo, si existe regresa un error
            //@Código original por mi pana ZakiTheFoxo
            if(!validateNonExistingEmail($data,$mysqli)){
                echo '{"status":501,"description":"Correo ya registrado"}';
                die();
            }

            // Valida que no exista el celular, si existe regresa un error
            //@Código original por mi pana ZakiTheFoxo
            if(!validateNonExistingCelular($data,$mysqli)){
                echo '{"status":501,"description":"Celular ya registrado"}';
                die();
            }

        }
	}
    
	if($method=='GET'){
    }	
    
	if($method=='PUT'){
        // Modifica el usuario
        if(modifyUser($data,$mysqli)){
            $result["status"] = 200;
            echo json_encode($result);
            die();
        } else {
            echo '{"status":502,"description":"Error al actualizar la informacion usuario"}';
            die();
        }
	}	
	
	if($method=='DELETE'){
	}
?>