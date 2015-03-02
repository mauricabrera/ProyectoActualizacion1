<?php if(!defined("SPECIALCONSTANT")) die("Acceso denegado");

function getConnection()
{
	try{
		$db_username = "root";
		$db_password = "";
		$connection = new PDO("mysql:host=localhost;dbname=clasificados", $db_username, $db_password);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET tipoclasificado 'utf8'");

        echo json_encode($connection);
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
	return $connection;
}

function connect_db() {
	$server = 'localhost'; // this may be an ip address instead
	$user = 'root';
	$pass = '';
	$database = 'clasificados';
	$connection = new mysqli($server, $user, $pass, $database);
     mysqli_set_charset($connection, 'utf8');
     //    mysqli_set_charset($connection, 'latin1_spanish_ci');


	return $connection;
}

function getDB() {
$dbhost="127.0.0.1";
$dbuser="root";
$dbpass="";
$dbname="clasificados";
$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $dbConnection;
}
?>