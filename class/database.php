<?php
/* @autor Jorghi Cote */
class Database {
    private $host = 'localhost';
    private $db_name = 'MIPROYECTO';
    private $username = 'root'; 
    private $password = 'DNDefault123'; 
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }

    public function insert($table, $data) {
        $conn = $this->getConnection();
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        
        $query = "INSERT INTO " . $table . " (" . $columns . ") VALUES (" . $placeholders . ")";
        $stmt = $conn->prepare($query);
        
        return $stmt->execute($data);
    }

    public function select($table, $conditions = []) {
        $conn = $this->getConnection();
        $query = "SELECT * FROM " . $table;
        
        if (!empty($conditions)) {
            $query .= " WHERE ";
            $whereConditions = [];
            foreach ($conditions as $key => $value) {
                $whereConditions[] = $key . " = :" . $key;
            }
            $query .= implode(" AND ", $whereConditions);
        }
        
        $stmt = $conn->prepare($query);
        $stmt->execute($conditions);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($table, $conditions) {
        $conn = $this->getConnection();
        $query = "DELETE FROM " . $table . " WHERE ";
        
        $whereConditions = [];
        foreach ($conditions as $key => $value) {
            $whereConditions[] = $key . " = :" . $key;
        }
        $query .= implode(" AND ", $whereConditions);
        
        $stmt = $conn->prepare($query);
        return $stmt->execute($conditions);
    }

    public function update($table, $data, $conditions) {
        $conn = $this->getConnection();
        $query = "UPDATE " . $table . " SET ";
        
        $setConditions = [];
        foreach ($data as $key => $value) {
            $setConditions[] = $key . " = :" . $key;
        }
        $query .= implode(", ", $setConditions) . " WHERE ";
        
        $whereConditions = [];
        foreach ($conditions as $key => $value) {
            $whereConditions[] = $key . " = :cond_" . $key;
        }
        $query .= implode(" AND ", $whereConditions);
        
        // Combinar datos y condiciones
        $params = [];
        foreach ($data as $key => $value) {
            $params[$key] = $value;
        }
        foreach ($conditions as $key => $value) {
            $params['cond_' . $key] = $value;
        }
        
        $stmt = $conn->prepare($query);
        return $stmt->execute($params);
    }
}
?>