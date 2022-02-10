<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,ContentType,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once 'db.php';
include_once 'userModel.php';

if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    parse_str(file_get_contents('php://input'), $_DELETE);
    var_dump($_DELETE); //$_PUT contains put fields 
    
    if(isset($_DELETE['id'])) {
    $id = htmlspecialchars(strip_tags($_DELETE['id']));
    $userModel = new userModel();
    $dane = $userModel->usunUzytkownika($id);
    }
    else{
        echo "[{'error':'Brak id użytkownika'}]";
    }
}
?>