<?php
require_once 'model/LoveStatus.php';

class LoveStatusViewModel {
    private $loveStatus;

    public function __construct() {
        $this->loveStatus = new LoveStatus();
    }

    public function getLoveStatusList() {
        return $this->loveStatus->getAll();
    }

    public function getLoveStatusById($id) {
        return $this->loveStatus->getById($id);
    }

    public function addLoveStatus($status_name) {
        return $this->loveStatus->create($status_name);
    }

    public function updateLoveStatus($id, $status_name) {
        return $this->loveStatus->update($id, $status_name);
    }

    public function deleteLoveStatus($id) {
        return $this->loveStatus->delete($id);
    }
}
?>