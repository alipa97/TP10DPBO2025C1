<?php
require_once 'viewmodel/LoveHistoryViewModel.php';
require_once 'viewmodel/CrushViewModel.php';
require_once 'viewmodel/LoveStatusViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'loveHistory';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'loveHistory') {
    $viewModel = new LoveHistoryViewModel();
    if ($action == 'list') {
        $loveHistoryList = $viewModel->getLoveHistoryList();
        require_once 'views/love_history_list.php';
    } elseif ($action == 'add') {
        $crushes = $viewModel->getCrushes();
        $loveStatuses = $viewModel->getLoveStatuses();
        require_once 'views/love_history_form.php';
    } elseif ($action == 'edit') {
        $loveHistory = $viewModel->getLoveHistoryById($_GET['id']);
        $crushes = $viewModel->getCrushes();
        $loveStatuses = $viewModel->getLoveStatuses();
        require_once 'views/love_history_form.php';
    } elseif ($action == 'save') {
        $viewModel->addLoveHistory($_POST['lover_name'], $_POST['crush_id'], $_POST['start_date'], $_POST['status_id']);
        header('Location: index.php?entity=loveHistory');
    } elseif ($action == 'update') {
        $viewModel->updateLoveHistory($_GET['id'], $_POST['lover_name'], $_POST['crush_id'], $_POST['start_date'], $_POST['status_id']);
        header('Location: index.php?entity=loveHistory');
    } elseif ($action == 'delete') {
        $viewModel->deleteLoveHistory($_GET['id']);
        header('Location: index.php?entity=loveHistory');
    }
} elseif ($entity == 'crush') {
    $viewModel = new CrushViewModel();
    if ($action == 'list') {
        $crushList = $viewModel->getCrushList();
        require_once 'views/crush_list.php';
    } elseif ($action == 'add') {
        require_once 'views/crush_form.php';
    } elseif ($action == 'edit') {
        $crush = $viewModel->getCrushById($_GET['id']);
        require_once 'views/crush_form.php';
    } elseif ($action == 'save') {
        $viewModel->addCrush($_POST['name']);
        header('Location: index.php?entity=crush');
    } elseif ($action == 'update') {
        $viewModel->updateCrush($_GET['id'], $_POST['name']);
        header('Location: index.php?entity=crush');
    } elseif ($action == 'delete') {
        $viewModel->deleteCrush($_GET['id']);
        header('Location: index.php?entity=crush');
    }
} elseif ($entity == 'loveStatus') {
    $viewModel = new LoveStatusViewModel();
    if ($action == 'list') {
        $loveStatusList = $viewModel->getLoveStatusList();
        require_once 'views/love_status_list.php';
    } elseif ($action == 'add') {
        require_once 'views/love_status_form.php';
    } elseif ($action == 'edit') {
        $loveStatus = $viewModel->getLoveStatusById($_GET['id']);
        require_once 'views/love_status_form.php';
    } elseif ($action == 'save') {
        $viewModel->addLoveStatus($_POST['status_name']);
        header('Location: index.php?entity=loveStatus');
    } elseif ($action == 'update') {
        $viewModel->updateLoveStatus($_GET['id'], $_POST['status_name']);
        header('Location: index.php?entity=loveStatus');
    } elseif ($action == 'delete') {
        $viewModel->deleteLoveStatus($_GET['id']);
        header('Location: index.php?entity=loveStatus');
    }
}
?>
