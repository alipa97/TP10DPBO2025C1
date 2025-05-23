<?php
require_once 'config/Database.php';

class LoveHistory {
    private $conn;
    private $table = 'love_history';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT lh.*, c.name as crush_name, ls.status_name
                 FROM " . $this->table . " lh 
                 JOIN crush_target c ON lh.crush_id = c.id 
                 JOIN love_status ls ON lh.status_id = ls.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT lh.*, c.name as crush_name, ls.status_name 
                 FROM " . $this->table . " lh 
                 JOIN crush_target c ON lh.crush_id = c.id 
                 JOIN love_status ls ON lh.status_id = ls.id 
                 WHERE lh.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($lover_name, $crush_id, $start_date, $status_id) {
        $query = "INSERT INTO " . $this->table . " (lover_name, crush_id, start_date, status_id) VALUES (:lover_name, :crush_id, :start_date, :status_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':lover_name', $lover_name);
        $stmt->bindParam(':crush_id', $crush_id);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':status_id', $status_id);
        return $stmt->execute();
    }

    public function update($id, $lover_name, $crush_id, $start_date, $status_id) {
        $query = "UPDATE " . $this->table . " SET lover_name = :lover_name, crush_id = :crush_id, start_date = :start_date, status_id = :status_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':lover_name', $lover_name);
        $stmt->bindParam(':crush_id', $crush_id);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':status_id', $status_id);
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