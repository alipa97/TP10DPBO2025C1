<?php
require_once 'model/LoveHistory.php';
require_once 'model/CrushTarget.php';
require_once 'model/LoveStatus.php';

class LoveHistoryViewModel {
    private $loveHistory;
    private $crush;
    private $loveStatus;

    public function __construct() {
        $this->loveHistory = new LoveHistory();
        $this->crush = new CrushTarget();
        $this->loveStatus = new LoveStatus();
    }

    public function getLoveHistoryList() {
        return $this->loveHistory->getAll();
    }

    public function getLoveHistoryById($id) {
        return $this->loveHistory->getById($id);
    }

    public function getCrushes() {
        return $this->crush->getAll();
    }

    public function getLoveStatuses() {
        return $this->loveStatus->getAll();
    }

    public function addLoveHistory($name, $crush_id, $start_date, $status_id) {
        return $this->loveHistory->create($name, $crush_id, $start_date, $status_id);
    }

    public function updateLoveHistory($id, $name, $crush_id, $start_date, $status_id) {
        return $this->loveHistory->update($id, $name, $crush_id, $start_date, $status_id);
    }

    public function deleteLoveHistory($id) {
        return $this->loveHistory->delete($id);
    }
}
?>