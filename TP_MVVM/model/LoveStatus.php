<?php
require_once 'config/Database.php';

class LoveStatus {
    private $conn;
    private $table = 'love_status';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($status_name) {
        $query = "INSERT INTO " . $this->table . " (status_name) VALUES (:status_name)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status_name', $status_name);
        return $stmt->execute();
    }

    public function update($id, $status_name) {
        $query = "UPDATE " . $this->table . " SET status_name = :status_name WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status_name', $status_name);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>