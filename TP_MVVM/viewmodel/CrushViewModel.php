<?php
require_once 'model/CrushTarget.php';

class CrushViewModel {
    private $crush;

    public function __construct() {
        $this->crush = new CrushTarget();
    }

    public function getCrushList() {
        return $this->crush->getAll();
    }

    public function getCrushById($id) {
        return $this->crush->getById($id);
    }

    public function addCrush($name) {
        return $this->crush->create($name);
    }

    public function updateCrush($id, $name) {
        return $this->crush->update($id, $name);
    }

    public function deleteCrush($id) {
        return $this->crush->delete($id);
    }
}
?>