<?php
class Database {
    private $host = "localhost";
    private $db_name = "domicilios";
    private $username = "postgres";
    private $password = "dany7532159684";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("pgsql:host=" . $this->host . ";dbname=" . $this->db_name,
                                  $this->username, $this->password);
        } catch(PDOException $exception) {
            echo "Error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
