<?php
require_once '../include/DbHandler.php';
require_once '../include/PassHash.php';
require '.././libs/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

// User id from db - Global Variable
$user_id = NULL;

/**
 * Adding Middle Layer to authenticate every request
 * Checking if the request has valid api key in the 'Authorization' header
 */
function authenticate(\Slim\Route $route) {
    

if(!function_exists('apache_request_headers')) {
    function apache_request_headers() {
        $headers = array();
        foreach($_SERVER as $key => $value) {
            if(substr($key, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))))] = $value;
            }
        }
        return $headers;
    }
}

	
	
	// Getting request headers
    $headers = apache_request_headers();
	
	
    $response = array();
    $app = \Slim\Slim::getInstance();

    // Verifying Authorization Header
    if (isset($headers['Authorization'])) {
        $db = new DbHandler();

        // get the api key
        $api_key = $headers['Authorization'];
        // validating api key
        if (!$db->isValidApiKey($api_key)) {
            // api key is not present in users table
            $response["error"] = true;
            $response["message"] = "Access Denied. Invalid Api key";
            echoRespnse(401, $response);
            $app->stop();
        } else {
            global $user_id;
            // get user primary key id
            $user_id = $db->getApiKeyId($api_key);
        }
    } else {
        // api key is missing in header
        $response["error"] = true;
        $response["message"] = "Api key is misssing";
        echoRespnse(400, $response);
        $app->stop();
    }
}

/*
 * ------------------------ METHODS WITH AUTHENTICATION ------------------------
 */

/**
 * Listing all tasks of particual user
 * method GET
 * url /tasks          
 */
$app->get('/edictos', 'authenticate', function() {
            global $user_id;
            $response = array();
            $db = new DbHandler();

            // fetching all user tasks
            $result = $db->getAllEdictos();

           // $response["error"] = false;
            $response["edictos"]  = array();

            // looping through result and preparing tasks array
            while ($task = $result->fetch_assoc()) {
                $tmp = array();
                $tmp["id_edicto"] = $task["id_edicto"];
                $tmp["edicto_para"] = $task["edicto_para"];
                $tmp["edicto_texto"] = $task["edicto_texto"];
                $tmp["edicto_periodico"] = $task["edicto_periodico"];
				$tmp["id_usuario"] = $task["id_usuario"];
                $tmp["edicto_fecha"] = $task["edicto_fecha"];
                $tmp["edicto_estado"] = $task["edicto_estado"];
                array_push($response["edictos"], $tmp);
            }

            echoRespnse(200, $response);
        });

/**
 * Listing single task of particual user
 * method GET
 * url /tasks/:id
 * Will return 404 if the task doesn't belongs to user
 */
$app->get('/edictos/:id', 'authenticate', function($task_id) {
       
            $response = array();
            $db = new DbHandler();

			$response["edictos"]  = array();
            // fetch task
            $result = $db->getEdicto($task_id);

            if ($result != NULL) {
				$response["edictos"]  = array();
               // $response["error"] = false;
                $response["id_edicto"] = $result["id_edicto"];
                $response["edicto_para"] = $result["edicto_para"];
                $response["edicto_texto"] = $result["edicto_texto"];
                $response["edicto_periodico"] = $result["edicto_periodico"];
				$response["id_usuario"] = $result["id_usuario"];
				$response["usuario"] = $result["usuario"];
                $response["edicto_fecha"] = $result["edicto_fecha"];
                $response["edicto_estado"] = $result["edicto_estado"];
                echoRespnse(200, $response["edictos"]);
            } else {
                $response["error"] = true;
                $response["message"] = "The requested resource doesn't exists";
                echoRespnse(404, $response);
            }
        });


		
		
/**
 * Listing all clients
 * method GET
 * url /clientes          
 */
//$app->get('/clientes', 'authenticate', function() {
  $app->get('/clientes', function() {
		
		//echo json_encode(array('success'=>true)); 
			global $user_id;
            $response = array();
            $db = new DbHandler();
			
            // fetching all user tasks
            $result = $db->getAllClientes();
			 
            while ($task = $result->fetch_assoc()) {
                $tmp = array();
                $tmp["id_cliente"] = $task["id_cliente"];
                $tmp["nombres"] = $task["nombres"];
                
				array_push($response["clientes"], $tmp);
            }
			
            // if ($result != NULL) {
				// //$response["clientes"]  = array();
               // // $response["error"] = false;
                // $response["id_cliente"] = $result["id_cliente"];
                // $response["nombres"] = $result["nombres"];
               
                // echoRespnse(200, $response["clientes"]);
            // } else {
                // $response["error"] = true;
                // $response["message"] = "The requested resource doesn't exists";
               
            // }
			
			 echoRespnse(200, $response);
        });

		
		
/**
 * Listing all clients
 * method GET
 * url /filtros          
 */
$app->get('/filtros', 'authenticate', function() {
            global $user_id;
            $response = array();
            $db = new DbHandler();

            // fetching all user tasks
            $result = $db->getAllFiltros();

            //$response["error"] = false;
            $response["filtros"] = array();

            // looping through result and preparing tasks array
            while ($task = $result->fetch_assoc()) {
                $tmp = array();
                $tmp["id_clienteusuario"] = $task["id_clienteusuario"];
				$tmp["nombre_clienteusuario"] = $task["nombre_clienteusuario"];
				$tmp["apellidos_clienteusuario"] = $task["apellidos_clienteusuario"];
                $tmp["direccion_clienteusuario"] = $task["direccion_clienteusuario"];
				$tmp["ci_clienteusuario"] = $task["ci_clienteusuario"];
				$tmp["tipo_clienteusuario"] = $task["tipo_clienteusuario"];
				$tmp["nit_clienteusuario"] = $task["nit_clienteusuario"];
				$tmp["numregcom_clienteusuario"] = $task["numregcom_clienteusuario"];
				$tmp["id_usuario"] = $task["id_usuario"];
				$tmp["tipo_filtro"] = $task["tipo_filtro"];
				$tmp["created_at"] = $task["created_at"];
				$tmp["updated_at"] = $task["updated_at"];
                array_push($response["clientes"] , $tmp);
            }

            echoRespnse(200, $response);
        });
/**
 * Listing single client 
 * method GET
 * url /clientes/:id
 */
$app->get('/clientes/:id', 'authenticate', function($task_id) {
       
            $response = array();
            $db = new DbHandler();

            // fetch task
            $result = $db->getCliente($task_id);

            if ($result != NULL) {
               // $response["error"] = false;
                //$response["clientes"] = array();
					$response["clientes"]  = array();
            // looping through result and preparing tasks array
            while ($task = $result->fetch_assoc()) {
                $tmp = array();
                $tmp["id_cliente"] = $task["id_cliente"];
                $tmp["nombres"] = $task["nombres"];
                $tmp["apellidopaterno"] = $task["apellidopaterno"];
                $tmp["apellidomaterno"] = $task["apellidomaterno"];
				$tmp["celular"] = $task["celular"];
                $tmp["telefono"] = $task["telefono"];
                $tmp["email"] = $task["email"];
                $tmp["direccion"] = $task["direccion"];
				$tmp["ciudad"] = $task["ciudad"];
                $tmp["nombrefactura"] = $task["nombrefactura"];
                $tmp["nit"] = $task["nit"];
                $tmp["descripcionservicios"] = $task["descripcionservicios"];
				$tmp["tituloprofesional"] = $task["tituloprofesional"];
                $tmp["alta"] = $task["alta"];
                $tmp["id_tiposervicio"] = $task["id_tiposervicio"];
                $tmp["cobrado"] = $task["cobrado"];
                //array_push($response["clientes"], $tmp);
				array_push($response["clientes"], $tmp);
            }

            echoRespnse(200, $response);
			
            }
			else {
                $response["error"] = true;
                $response["message"] = "The requested resource doesn't exists";
                echoRespnse(404, $response);
            }
        });

		
		
		
/**
 * Echoing json response to client
 * @param String $status_code Http response code
 * @param Int $response Json response
 */
function echoRespnse($status_code, $response) {
    $app = \Slim\Slim::getInstance();
    // Http response code
    $app->status($status_code);

    // setting response content type to json
    $app->contentType('application/json');

    echo json_encode($response);
}

$app->run();
?>