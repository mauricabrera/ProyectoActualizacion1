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

        echo '<script language="javascript">';
echo 'alert("clasifiado successfully insertado!")';
echo '</script>';
        
        
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


?>
