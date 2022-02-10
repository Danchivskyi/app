<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,ContentType,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once 'db.php';
include_once 'userModel.php';

if($_SERVER['REQUEST_METHOD'] == 'PUT') {
    parse_str(file_get_contents('php://input'), $_PUT);
    var_dump($_PUT);
    
    if(isset($_PUT['fName'])&&
    isset($_PUT['lName'])&&
    isset($_PUT['email'])&&
    isset($_PUT['pass'])&&
    isset($_PUT['uName'])&&
    isset($_PUT['id'])) {
    $id = htmlspecialchars(strip_tags($_PUT['id']));
    $pass = htmlspecialchars(strip_tags($_PUT['pass']));
    $fName = htmlspecialchars(strip_tags($_PUT['fName']));
    $lName = htmlspecialchars(strip_tags($_PUT['lName']));
    $uName = htmlspecialchars(strip_tags($_PUT['uName']));
    $email = htmlspecialchars(strip_tags($_PUT['email']));
    $userModel = new userModel();
    $dane = $userModel->edytujUzytkownika($id,$fName,$lName,$email,$uName,$pass);
    
    }
    else{
        echo "[{'error':'Wypełnij wszystkie pola'}]";
    }
}
?>