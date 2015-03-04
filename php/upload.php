<?php

define("SPECIALCONSTANT", true);

require '../api/app/libs/connect.php';

$output_dir = "uploads/";

//$titulo = $_POST["titulo"];
//$id_usuario = 1;
//        $texto = $_POST["texto"];
//        $tipoclasificado = $_POST["tipoclasificado"];
//            
//        $imagen = "urlimagen";

if(isset($_FILES["myfile"]))
{
	$ret = array();
	
//	This is for custom errors;	
/*	$custom_error= array();
	$custom_error['jquery-upload-file-error']="File already exists";
	echo json_encode($custom_error);
	die();
*/
	$error =$_FILES["myfile"]["error"];
	//You need to handle  both cases
	//If Any browser does not support serializing of multiple files using FormData() 
	date_default_timezone_set("America/La_Paz");
		$t = time();
		$dat = date("dmYHis", $t);
	if(!is_array($_FILES["myfile"]["name"])) //single file
	{
		
 	 	$fileName = $_FILES["myfile"]["name"];
 		move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$dat.$fileName);
    	$ret[]= $dat.$fileName;
	}
	else  //Multiple files, file[]
	{
	  $fileCount = count($_FILES["myfile"]["name"]);
	  for($i=0; $i < $fileCount; $i++)
	  {
	  	$fileName = $_FILES["myfile"]["name"][$i];
		move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$dat.$fileName);
	  	$ret[]= $dat.$fileName;
	  }
	
	}
    echo json_encode($ret);
    
//    try{   
//        
//        
//        $db = connect_db();
//      
//        $stmt = mysqli_prepare($db, "INSERT INTO `clasificados`.`clasificado` (`id_clasificado`, `titulo`, `id_usuario`, `texto`, `id_tipoclasificado`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `imagen6`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, ?, ?, ?, 'urlimagen3', 'urlimagen4', 'urlimagen5', 'urlimagen6', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
//
//            if ($stmt === false) {
//                trigger_error('Statement failed! ' . htmlspecialchars(mysqli_error($db)), E_USER_ERROR);
//            }
//
//           // $id_clasificado = null;
//            $bind = mysqli_stmt_bind_param($stmt, "sisiss", $titulo, $id_usuario, $texto, $tipoclasificado, $ret[0], $ret[0]);
//
//            if ($bind === false) {
//                trigger_error('Bind param failed!', E_USER_ERROR);
//            } 
//
//            $exec = mysqli_stmt_execute($stmt);
//
//            if ($exec === false) {
//                trigger_error('Statement execute failed! ' . htmlspecialchars(mysqli_stmt_error($stmt)), E_USER_ERROR);	
//            }
//
//
//        echo json_encode(mysqli_insert_id($db));
//        mysqli_close($db);
//       
//
//	}
//	catch(PDOException $e)
//	{
//		echo "Error: " . $e->getMessage();
//	}
//    
    
 }
 ?>