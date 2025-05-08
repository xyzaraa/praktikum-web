<?php
require_once 'Database.php';
require_once 'Traits/cust.php';

use CustNamespace\CustTrait; 

class CustController {
    use CustTrait;

    private $db;
    private $conn;

    public function __construct() {
        $this->db = new Database();
        $this->conn = $this->db->connect();
    }

    public function createcust($namacust, $jeniscust, $deskripsicust, $membercust) {
        $query = "INSERT INTO databasecust (namacust, jeniscust, deskripsicust, membercust) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$namacust, $jeniscust, $deskripsicust, $membercust]);
    }

    public function deletecust($custId) {
        $query = "DELETE FROM databasecust WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$custId]);
    }

    public function getAllcusts() {
        $query = "SELECT * FROM databasecust";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $custs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $custs;
    }
}
?>
