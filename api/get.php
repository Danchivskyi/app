<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,ContentType,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once 'db.php';
include_once 'userModel.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['username'])) {
    $username = htmlspecialchars(strip_tags($_GET['username']));
   
    $userModel = new userModel();
    $dane = $userModel->znajdzUzytkownika($username);
    }
}
?>
