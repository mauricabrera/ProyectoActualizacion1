<?php
if(!defined("SPECIALCONSTANT")) die("Acceso denegado");

$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

$app->get('/tipoclasificado', function () use ($app) {
	//require_once 'libs/connect.php';
   // require_once 'app/libs/connect.php';
	$db = connect_db();
    
	$result = $db->query( 'SELECT * FROM tipoclasificado' );
    
     $db = null;
    
    /* verificar la conexión */
        if (mysqli_connect_errno()) {
            die("Falló la conexión: %s\n".$mysqli->connect_error);
        }
//        else {
//            echo "conecto";
//        }
    
    
	while ( $row = $result->fetch_array(MYSQLI_ASSOC) ) {
		$data[] = $row;
        
	}
    
   // print_r( $data[0]);
    //print_r ($data[1]);
    //echo json_encode($data);
    
    $app->response->headers->set("Content-type", "application/json");
    $app->response->status(200);
	$app->response->body(json_encode($data));
    

//	$app->render('friends.php', array(
//			'id_tipoclasidicado' => "Your Friends",
//			'nombre' => $data
//		)
//	);
    
//    $sql = "select * from tipoclasificado";
//    try {
//        $db = getDB();
//        $stmt = $db->prepare($sql); 
//        $stmt->execute();  
//        $updates = $stmt->fetchAll(PDO::FETCH_OBJ);
//        $db = null;
//        echo '{"updates": ' . json_encode($updates) . '}';
//        } catch(PDOException $e) {
//        echo '{"error":{"text":'. $e->getMessage() .'}}';
//        }
});

//$app->get("/tipoclasificado/", function() use($app)
//{
//	try{
//		$connection = getConnection();
//        echo json_encode($connection);
//		$dbh = $connection->prepare("SELECT * FROM tipoclasificado");
//        echo json_encode($dbh);
//		$dbh->execute();
//		$tipoclasificado = $dbh->fetchAll();
//        echo json_encode($tipoclasificado);
//		$connection = null;
//
//		$app->response->headers->set("Content-type", "application/json");
//		$app->response->status(200);
//		$app->response->body(json_encode($tipoclasificado));
//	}
//	catch(PDOException $e)
//	{
//		echo "Error: " . $e->getMessage();
//	}
//});

$app->get("/tipoclasificado/:id", function($id) use($app)
{
	try{
//		$connection = getConnection();
//		$dbh = $connection->prepare("SELECT * FROM tipoclasificado WHERE id_tipoclasificado = 1");
//		//$dbh->bindParam(1, $id);
//		$dbh->execute();
//	//	$book = $dbh->fetch();
//        $updates = $dbh->fetchAll(PDO::FETCH_OBJ);
//		$connection = null;
        
        $db = connect_db();
    
	$result = $db->query( 'SELECT * FROM tipoclasificado WHERE id_tipoclasificado = '.$id );
        if($result === false) {
          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
        }
        
        
       
     $db = null;
    
    /* verificar la conexión */
        if (mysqli_connect_errno()) {
            die("Falló la conexión: %s\n".$mysqli->connect_error);
        }
//        else {
//            echo "conecto";
//        }
    
    
	while ( $row = $result->fetch_array(MYSQLI_ASSOC) ) {
		$data[] = $row;
        
	}
        $resulta = mysqli_num_rows($result);
        
        if($resulta == 0) {
        echo "nay";
        }

        

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode($data));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});


$app->post("/introclasificado", function() use($app)
{
    
  try{   
      
      $formulario = $app->request->post('formulario');

    parse_str($formulario, $form_array);
    $str = json_decode($app->request->post('imagenes'), true);  
    
//    $app->response->headers->set("Content-type", "application/json");
//		$app->response->status(200);
//		$app->response->body(json_encode($form_array['"titulo']));
      
        $titulo = $form_array['"titulo'];
      session_start();
      if(isset($_SESSION['id_usuario'])){
          $id_usuario = $_SESSION['id_usuario'];
      }else {     
            $id_usuario = 1;
      }
      
        $texto = $form_array["texto"];
        $tipoclasificado = $form_array["tipoclasificado"];

        $db = connect_db();
      
      $paquitar = array('"', "[", "]");
      
      if ($str[0] == null){
        $stmt = mysqli_prepare($db, "INSERT INTO `clasificados`.`clasificado` (`id_clasificado`, `titulo`, `id_usuario`, `texto`, `id_tipoclasificado`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `imagen6`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, ?, 'urlimagen1', 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
          $bind = mysqli_stmt_bind_param($stmt, "sisi", $titulo, $id_usuario, $texto, $tipoclasificado);
          
      } elseif (!isset($str[1])){
        $stmt = mysqli_prepare($db, "INSERT INTO `clasificados`.`clasificado` (`id_clasificado`, `titulo`, `id_usuario`, `texto`, `id_tipoclasificado`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `imagen6`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, ?, ?, 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
          $bind = mysqli_stmt_bind_param($stmt, "sisis", $titulo, $id_usuario, $texto, $tipoclasificado, str_replace($paquitar, "", $str[0]));
      } elseif (!isset($str[2])){
        $stmt = mysqli_prepare($db, "INSERT INTO `clasificados`.`clasificado` (`id_clasificado`, `titulo`, `id_usuario`, `texto`, `id_tipoclasificado`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `imagen6`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, ?, ?, ?, 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
          $bind = mysqli_stmt_bind_param($stmt, "sisiss", $titulo, $id_usuario, $texto, $tipoclasificado, str_replace($paquitar, "", $str[0]), str_replace($paquitar, "", $str[1]));
      } elseif (!isset($str[3])){
        $stmt = mysqli_prepare($db, "INSERT INTO `clasificados`.`clasificado` (`id_clasificado`, `titulo`, `id_usuario`, `texto`, `id_tipoclasificado`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `imagen6`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, 'urlimagen4', 'urlimagen5', 'urlimagen6', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
          $bind = mysqli_stmt_bind_param($stmt, "sisisss", $titulo, $id_usuario, $texto, $tipoclasificado, str_replace($paquitar, "", $str[0]), str_replace($paquitar, "", $str[1]), str_replace($paquitar, "", $str[2]));
      } elseif (!isset($str[4])){
        $stmt = mysqli_prepare($db, "INSERT INTO `clasificados`.`clasificado` (`id_clasificado`, `titulo`, `id_usuario`, `texto`, `id_tipoclasificado`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `imagen6`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, 'urlimagen5', 'urlimagen6', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
          $bind = mysqli_stmt_bind_param($stmt, "sisissss", $titulo, $id_usuario, $texto, $tipoclasificado, str_replace($paquitar, "", $str[0]), str_replace($paquitar, "", $str[1]), str_replace($paquitar, "", $str[2]), str_replace($paquitar, "", $str[3]));
      } elseif (!isset($str[5])){
        $stmt = mysqli_prepare($db, "INSERT INTO `clasificados`.`clasificado` (`id_clasificado`, `titulo`, `id_usuario`, `texto`, `id_tipoclasificado`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `imagen6`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'urlimagen6', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
          $bind = mysqli_stmt_bind_param($stmt, "sisisssss", $titulo, $id_usuario, $texto, $tipoclasificado, str_replace($paquitar, "", $str[0]), str_replace($paquitar, "", $str[1]), str_replace($paquitar, "", $str[2]), str_replace($paquitar, "", $str[3]), str_replace($paquitar, "", $str[4]));
      } elseif (!isset($str[6])){
        $stmt = mysqli_prepare($db, "INSERT INTO `clasificados`.`clasificado` (`id_clasificado`, `titulo`, `id_usuario`, `texto`, `id_tipoclasificado`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `imagen6`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
          $bind = mysqli_stmt_bind_param($stmt, "sisissssss", $titulo, $id_usuario, $texto, $tipoclasificado, str_replace($paquitar, "", $str[0]), str_replace($paquitar, "", $str[1]), str_replace($paquitar, "", $str[2]), str_replace($paquitar, "", $str[3]), str_replace($paquitar, "", $str[4]), str_replace($paquitar, "", $str[5]));
      }
      
//      
//        $stmt = mysqli_prepare($db, "INSERT INTO `clasificados`.`clasificado` (`id_clasificado`, `titulo`, `id_usuario`, `texto`, `id_tipoclasificado`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `imagen6`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, ?, ?, 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");

            if ($stmt === false) {
                trigger_error('Statement failed! ' . htmlspecialchars(mysqli_error($db)), E_USER_ERROR);
            }

           // $id_clasificado = null;

            if ($bind === false) {
                trigger_error('Bind param failed!', E_USER_ERROR);
            } 

            $exec = mysqli_stmt_execute($stmt);

            if ($exec === false) {
                trigger_error('Statement execute failed! ' . htmlspecialchars(mysqli_stmt_error($stmt)), E_USER_ERROR);	
            }

        $app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(mysqli_insert_id($db)));
        mysqli_close($db);

       //  $app->redirect('../crearAnuncio.php');
       

	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
    
	
});


$app->post("/introtipoclasificado/", function() use($app)
{
    
  try{   
        $titulo = $app->request->post('titulo');
        $id_usuario = 1;
        $texto = $app->request->post("texto");
        $tipoclasificado = $app->request->post('tipoclasificado');
            
        $imagen = "urlimagen";
        
        echo $titulo;

        $db = connect_db();
      
        $stmt = mysqli_prepare($db, "INSERT INTO `clasificados`.`clasificado` (`id_clasificado`, `titulo`, `id_usuario`, `texto`, `id_tipoclasificado`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `imagen6`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, ?, ?, 'urlimagen2', 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");

            if ($stmt === false) {
                trigger_error('Statement failed! ' . htmlspecialchars(mysqli_error($db)), E_USER_ERROR);
            }

           // $id_clasificado = null;
            $bind = mysqli_stmt_bind_param($stmt, "sisis", $titulo, $id_usuario, $texto, $tipoclasificado, $imagen);

            if ($bind === false) {
                trigger_error('Bind param failed!', E_USER_ERROR);
            } 

            $exec = mysqli_stmt_execute($stmt);

            if ($exec === false) {
                trigger_error('Statement execute failed! ' . htmlspecialchars(mysqli_stmt_error($stmt)), E_USER_ERROR);	
            }


        
        
        //printf ("New Record has id %d.\n", mysqli_insert_id($db));
        $app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(mysqli_insert_id($db)));
      //  mysqli_stmt_close($stmt);
        mysqli_close($db);

       //  $app->redirect('../crearAnuncio.php');
       

	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
    
	
});


$app->post("/actualizarclasificado/", function() use($app)
{
    
  try{   
        $id_clasificado = $app->request->post('id_clasificado');
        $titulo = $app->request->post('titulo');
        $texto = $app->request->post('texto');
        $id_tipoclasificado = $app->request->post('id_tipoclasificado');

        $db = connect_db();
      
        $stmt = mysqli_prepare($db, "UPDATE `clasificados`.`clasificado` SET `titulo` = ?, `texto` = ?, `id_tipoclasificado` = ? WHERE `clasificado`.`id_clasificado` = ?");

            if ($stmt === false) {
                trigger_error('Statement failed! ' . htmlspecialchars(mysqli_error($db)), E_USER_ERROR);
            }

           // $id_clasificado = null;
            $bind = mysqli_stmt_bind_param($stmt, "ssii", $titulo, $texto, $id_tipoclasificado, $id_clasificado);

            if ($bind === false) {
                trigger_error('Bind param failed!', E_USER_ERROR);
            } 

            $exec = mysqli_stmt_execute($stmt);

            if ($exec === false) {
                trigger_error('Statement execute failed! ' . htmlspecialchars(mysqli_stmt_error($stmt)), E_USER_ERROR);	
            }

        $app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(true));
      //  mysqli_stmt_close($stmt);
        mysqli_close($db);

       

	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
        $app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(false));
	}
    
	
});



$app->post("/eliminarclasificado/", function() use($app)
{
    
  try{   
        $id_clasificado = $app->request->post('id_clasificado');

        $db = connect_db();
      
        $stmt = mysqli_prepare($db, "DELETE FROM `clasificados`.`clasificado` WHERE `clasificado`.`id_clasificado` = ?");

            if ($stmt === false) {
                trigger_error('Statement failed! ' . htmlspecialchars(mysqli_error($db)), E_USER_ERROR);
            }

           // $id_clasificado = null;
            $bind = mysqli_stmt_bind_param($stmt, "i", $id_clasificado);

            if ($bind === false) {
                trigger_error('Bind param failed!', E_USER_ERROR);
            } 

            $exec = mysqli_stmt_execute($stmt);

            if ($exec === false) {
                trigger_error('Statement execute failed! ' . htmlspecialchars(mysqli_stmt_error($stmt)), E_USER_ERROR);	
            }

        $app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(true));
      //  mysqli_stmt_close($stmt);
        mysqli_close($db);

       

	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
        $app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(false));
	}
    
	
});


$app->post("/actualizarcomentario/", function() use($app)
{
    
  try{   
        $id_clasificado = $app->request->post('id_comentario');
        $titulo = $app->request->post('nombre');
        $texto = $app->request->post('texto');

        $db = connect_db();
      
        $stmt = mysqli_prepare($db, "UPDATE `clasificados`.`comentario` SET `nombre` = ?, `texto` = ?  WHERE `comentario`.`id_comentario` = ?");

            if ($stmt === false) {
                trigger_error('Statement failed! ' . htmlspecialchars(mysqli_error($db)), E_USER_ERROR);
            }

           // $id_clasificado = null;
            $bind = mysqli_stmt_bind_param($stmt, "ssi", $titulo, $texto, $id_clasificado);

            if ($bind === false) {
                trigger_error('Bind param failed!', E_USER_ERROR);
            } 

            $exec = mysqli_stmt_execute($stmt);

            if ($exec === false) {
                trigger_error('Statement execute failed! ' . htmlspecialchars(mysqli_stmt_error($stmt)), E_USER_ERROR);	
            }

        $app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(true));
      //  mysqli_stmt_close($stmt);
        mysqli_close($db);

       

	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
        $app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(false));
	}
    
	
});



$app->post("/eliminarcomentario/", function() use($app)
{
    
  try{   
        $id_comentario = $app->request->post('id_comentario');

        $db = connect_db();
      
        $stmt = mysqli_prepare($db, "DELETE FROM `clasificados`.`comentario` WHERE `comentario`.`id_comentario` = ?");

            if ($stmt === false) {
                trigger_error('Statement failed! ' . htmlspecialchars(mysqli_error($db)), E_USER_ERROR);
            }

           // $id_clasificado = null;
            $bind = mysqli_stmt_bind_param($stmt, "i", $id_comentario);

            if ($bind === false) {
                trigger_error('Bind param failed!', E_USER_ERROR);
            } 

            $exec = mysqli_stmt_execute($stmt);

            if ($exec === false) {
                trigger_error('Statement execute failed! ' . htmlspecialchars(mysqli_stmt_error($stmt)), E_USER_ERROR);	
            }

        $app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(true));
      //  mysqli_stmt_close($stmt);
        mysqli_close($db);

       

	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
        $app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(false));
	}
    
	
});


$app->post("/modificarpassword/", function() use($app)
{
    
  try{   
        $id_clasificado = $app->request->post('password1');

        $db = connect_db();
      
        $stmt = mysqli_prepare($db, "UPDATE `clasificados`.`usuario` SET `password` = ? WHERE `usuario`.`id_usuario` = 1");

            if ($stmt === false) {
                trigger_error('Statement failed! ' . htmlspecialchars(mysqli_error($db)), E_USER_ERROR);
            }

           // $id_clasificado = null;
            $bind = mysqli_stmt_bind_param($stmt, "s", $id_clasificado);

            if ($bind === false) {
                trigger_error('Bind param failed!', E_USER_ERROR);
            } 

            $exec = mysqli_stmt_execute($stmt);

            if ($exec === false) {
                trigger_error('Statement execute failed! ' . htmlspecialchars(mysqli_stmt_error($stmt)), E_USER_ERROR);	
            }

        $app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(true));
      //  mysqli_stmt_close($stmt);
        mysqli_close($db);

       

	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
        $app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(false));
	}
    
	
});


$app->get("/login/:usuario/:password", function($usuario, $password) use($app)
{
	try{

        $db = connect_db();
    
	$result = $db->query( "SELECT * FROM usuario WHERE usuario like '".$usuario."' and password like '".$password."'" );
        if($result === false) {
          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
        }
        
        if (mysqli_connect_errno()) {
            die("Falló la conexión: %s\n".$mysqli->connect_error);
        }

        while ( $row = $result->fetch_array(MYSQLI_ASSOC) ) {
		$data[] = $row;
        
	   }
        $resulta = mysqli_num_rows($result);
        
        session_start();
        
        if($resulta == 0) {
        $app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(false));
        } elseif ($data[0]["admin"] == 1){
            $_SESSION['id_usuario'] = $data[0]["id_usuario"];
            $_SESSION['usuario'] = $data[0]["usuario"];
            $_SESSION["password"] = md5($data[0]["password"]);
            $_SESSION['nombres'] = $data[0]["nombres"];
            $_SESSION['apellidos'] = $data[0]["apellidos"];
            $_SESSION['admin'] = $data[0]["admin"];
            $app->response->headers->set("Content-type", "application/json");
		    $app->response->status(200);
		    $app->response->body(json_encode(1));
        }
        else {
        
            $_SESSION['id_usuario'] = $data[0]["id_usuario"];
            $_SESSION['usuario'] = $data[0]["usuario"];
            $_SESSION["password"] = md5($data[0]["password"]);
            $_SESSION['nombres'] = $data[0]["nombres"];
            $_SESSION['apellidos'] = $data[0]["apellidos"];
          //  echo $_SESSION['id_usuario'];
            $app->response->headers->set("Content-type", "application/json");
		    $app->response->status(200);
		    $app->response->body(json_encode(true));
//            $app->redirect('../AdminAnuncios.php');
        }
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});


$app->post("/RegistrarUsuario/", function() use($app)
{
    
  try{   
        $id_usuario = $app->request->post('id_usuario');
        $usuario = $app->request->post('usuario');
        $password = $app->request->post('password1');
        $nombres = $app->request->post('nombres');
        $apellidos = $app->request->post('apellidos');
        $telefono = $app->request->post('telefono');
        $email = $app->request->post('email');

        $db = connect_db();

        $stmt = mysqli_prepare($db, "INSERT INTO `clasificados`.`usuario` ( `usuario`, `password`, `nombres`, `apellidos`, `telefono`, `email`, `created_at`) VALUES (?, ?, ?, ?, ?,?, CURRENT_TIMESTAMP)");

            if ($stmt === false) {
                trigger_error('Statement failed! ' . htmlspecialchars(mysqli_error($db)), E_USER_ERROR);
            }

        $bind = mysqli_stmt_bind_param($stmt, "ssssis", $usuario, $password, $nombres, $apellidos, $telefono, $email);

            if ($bind === false) {
                trigger_error('Bind param failed!', E_USER_ERROR);
            } 

            $exec = mysqli_stmt_execute($stmt);

            if ($exec === false) {
                trigger_error('Statement execute failed! ' . htmlspecialchars(mysqli_stmt_error($stmt)), E_USER_ERROR); 
            }

        $app->response->headers->set("Content-type", "application/json");
    $app->response->status(200);
    $app->response->body(json_encode(true));
        mysqli_close($db);

       

  }
  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
        $app->response->headers->set("Content-type", "application/json");
    $app->response->status(200);
    $app->response->body(json_encode(false));
  }
    
  
});

$app->get("/logout", function() use($app) {
    session_start();
    session_destroy(); 
          
    $app->response->headers->set("Content-type", "application/json");
    $app->response->status(200);
    $app->response->body(json_encode(true));
    

});


$app->get("/clasificado/:id", function($id) use($app)
{
	try{

        $db = connect_db();
    
	$result = $db->query( 'SELECT * FROM clasificado WHERE id_clasificado = '.$id );
        if($result === false) {
          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
        }
        
        
       
     $db = null;
    
    /* verificar la conexión */
        if (mysqli_connect_errno()) {
            die("Falló la conexión: %s\n".$mysqli->connect_error);
        }
//        else {
//            echo "conecto";
//        }
    
    
	while ( $row = $result->fetch_array(MYSQLI_ASSOC) ) {
		$data[] = $row;
        
	}
        $resulta = mysqli_num_rows($result);
        
        if($resulta == 0) {
            $app->response->headers->set("Content-type", "application/json");
            $app->response->status(200);
            $app->response->body(json_encode(false));
        }
        else {
            $app->response->headers->set("Content-type", "application/json");
            $app->response->status(200);
            $app->response->body(json_encode($data));
        }

        

		
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});

$app->get("/comentarios/:id", function($id) use($app)
{
	try{

        $db = connect_db();
    
	$result = $db->query( 'SELECT * FROM comentario WHERE id_clasificado = '.$id );
        if($result === false) {
          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
        }
        
        
       
     $db = null;
    
    /* verificar la conexión */
        if (mysqli_connect_errno()) {
            die("Falló la conexión: %s\n".$mysqli->connect_error);
        }
//        else {
//            echo "conecto";
//        }
    
    
	while ( $row = $result->fetch_array(MYSQLI_ASSOC) ) {
		$data[] = $row;
        
	}
        $resulta = mysqli_num_rows($result);
        
        if($resulta == 0) {
            $app->response->headers->set("Content-type", "application/json");
            $app->response->status(200);
            $app->response->body(json_encode(false));
        }
        else {
            $app->response->headers->set("Content-type", "application/json");
            $app->response->status(200);
            $app->response->body(json_encode($data));
        }

        

		
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});

$app->post("/comentar/:id", function($id) use($app)
{
    
  try{   
        $id_clasificado = $id;
        $nombre = $app->request->post('nombre');
        $texto = $app->request->post('texto');
        
        $db = connect_db();

        $stmt = mysqli_prepare($db, "INSERT INTO `clasificados`.`comentario` ( `nombre`, `texto`, `id_clasificado`, `created_at`) VALUES (?, ?, ?, CURRENT_TIMESTAMP)");

            if ($stmt === false) {
                trigger_error('Statement failed! ' . htmlspecialchars(mysqli_error($db)), E_USER_ERROR);
            }

        $bind = mysqli_stmt_bind_param($stmt, "ssi", $nombre, $texto, $id_clasificado);

            if ($bind === false) {
                trigger_error('Bind param failed!', E_USER_ERROR);
                $app->response->headers->set("Content-type", "application/json");
                $app->response->status(200);
                $app->response->body(json_encode(false));
                mysqli_close($db);
            } 

            $exec = mysqli_stmt_execute($stmt);

            if ($exec === false) {
                trigger_error('Statement execute failed! ' . htmlspecialchars(mysqli_stmt_error($stmt)), E_USER_ERROR); 
                $app->response->headers->set("Content-type", "application/json");
                $app->response->status(200);
                $app->response->body(json_encode(false));
                mysqli_close($db);
            }

        $app->response->headers->set("Content-type", "application/json");
        $app->response->status(200);
        $app->response->body(json_encode(true));
        mysqli_close($db);

       

  }
  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
        $app->response->headers->set("Content-type", "application/json");
    $app->response->status(200);
    $app->response->body(json_encode(false));
  }
    
  
});


?>
