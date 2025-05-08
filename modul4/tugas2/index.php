<?php
require_once 'Controller/CustomerController.php';

$custController = new custController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['namacust']) && isset($_GET['jeniscust']) && isset($_GET['deskripsicust']) && isset($_GET['membercust'])) {
        $namacust = $_GET['namacust'];
        $jeniscust = $_GET['jeniscust'];
        $deskripsicust = $_GET['deskripsicust'];
        $membercust = $_GET['membercust'];
        
        $custController->createcust($namacust, $jeniscust, $deskripsicust, $membercust);
    } elseif (isset($_GET['delete'])) {
        $custId = $_GET['delete'];
        $custController->deletecust($custId);
    }
} else {
    echo json_encode($custController->getAllcusts());
}
?>
