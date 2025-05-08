<?php
namespace app\Models;

require_once 'Config/DatabaseConfig.php';

use app\Config\DatabaseConfig;
use mysqli;

class User extends DatabaseConfig
{
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name);
        if ($this->conn->connect_error)
            die("Connection failed: " . $this->conn->connect_error);
    }

    public function findAll()
    {
        $sql = "SELECT users.*, products.product_name FROM users
                LEFT JOIN products ON users.product_id = products.id";
        $result = $this->conn->query($sql);
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function findById($id)
    {
        $sql = "SELECT users.*, products.product_name FROM users
                LEFT JOIN products ON users.product_id = products.id
                WHERE users.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function create($data)
    {
        $userName = $data['user_name'];
        $userId = $data['user_id'];
        $productId = $data['product_id'];

        $query = "INSERT INTO users (user_name, user_id, product_id) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sis", $userName, $userId, $productId);
        $stmt->execute();
        $this->conn->close();
    }

        public function update($data, $id)
    {
            $userName = $data['user_name'];
            $productId = $data['product_id'];

            $query = "UPDATE users SET user_name = ?, product_id = ? WHERE id = ?";
            $stmt = $this->conn->prepare($query);

            $stmt->bind_param("sii", $userName, $productId, $id);
            $stmt->execute();
            $this->conn->close();
    }

    public function destroy($id)
    {
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $this->conn->close();
    }
}
