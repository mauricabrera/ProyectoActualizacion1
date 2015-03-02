<?php

/**
 * Class to handle all db operations
 * This class will have CRUD methods for database tables
 *
 * @author Ravi Tamada
 * @link URL Tutorial link
 */
class DbHandler {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    /**
     * Validating user api key
     * If the api key is there in db, it is a valid key
     * @param String $api_key user api key
     * @return boolean
     */
    public function isValidApiKey($api_key) {
        $stmt = $this->conn->prepare("SELECT id from apikeys WHERE api_key = ?");
        $stmt->bind_param("s", $api_key);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }

	
	/**
     * Fetching apikey id by api key
     * @param String $api_key user api key
     */
    public function getApiKeyId($api_key) {
        $stmt = $this->conn->prepare("SELECT id FROM apikeys WHERE api_key = ?");
        $stmt->bind_param("s", $api_key);
        if ($stmt->execute()) {
            $user_id = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user_id;
        } else {
            return NULL;
        }
    }
	
	
    /* ------------- `edictos` table methods ------------------ */
    /**
     * Fetching single edict
     * @param String $id_edicto id of the edict
     */
    public function getEdicto($task_id) {
        $stmt = $this->conn->prepare("SELECT e.* from edictos e WHERE e.id_edicto = ?");
        $stmt->bind_param("i", $task_id);
        if ($stmt->execute()) {
            $res = array();
            $stmt->bind_result($id_edicto, $edicto_para, $edicto_texto, $edicto_periodico, $id_usuario, $edicto_fecha, $edicto_estado );
            
            $stmt->fetch();
            $res["id_edicto"] = $id_edicto;
            $res["edicto_para"] = $edicto_para;
            $res["edicto_texto"] = $edicto_texto;
            $res["edicto_periodico"] = $edicto_periodico;
			$res["id_usuario"] = $id_usuario;
            $res["edicto_fecha"] = $edicto_fecha;
            $res["edicto_estado"] = $edicto_estado;
            $stmt->close();
            return $res;
        } else {
            return NULL;
        }

    }

    /**
     * Fetching all edicts 
     * @param None
     */
    public function getAllEdictos() {
        $stmt = $this->conn->prepare("SELECT e.* FROM edictos e");
        $stmt->execute();
        $tasks = $stmt->get_result();
        $stmt->close();
        return $tasks;
    }
	
	/**
     * Fetching single client
     * @param String $id_cliente id of the client
     */
    public function getCliente($task_id) {
        $stmt = $this->conn->prepare("SELECT c.* from clientes c WHERE c.id_cliente = ?");
        $stmt->bind_param("i", $task_id);
        $stmt->execute();
        $tasks = $stmt->get_result();
        $stmt->close();
        return $tasks;
    }

    /**
     * Fetching all clients
     * @param None
     */
    public function getAllClientes() {
		//print_r($this->conn);
        $stmt = $this->conn->prepare("SELECT id_cliente, nombres from clientes");
		//phpinfo();
        $stmt->execute();
        $tasks = $stmt->get_result();
        $stmt->close();
        return $tasks;
		
    }

	
	/**
     * Fetching all filtros
     * @param None
     */
    public function getAllFiltros() {
        $stmt = $this->conn->prepare("SELECT * FROM clienteusuario");
        $stmt->execute();
        $tasks = $stmt->get_result();
        $stmt->close();
        return $tasks;
    }

    
    

}

?>
