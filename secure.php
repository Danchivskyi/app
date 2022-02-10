<?php
 session_start();

 $errors = array();
 $_SESSION['success'] = "";

 $connHost = 'localhost';
 $connUser = 'root';
 $connPass = '';
 $connName = "myDB";
 $connTableName = "uzytkownicy";

 $fName = "";
 $lName = "";
 $uName = "";
 $email = "";

 $conn = new mysqli($connHost, $connUser, $connPass);
	if($conn->connect_error) {
	echo("Po&#322;&#261;czenie nie udane: " . $conn->connect_error . '<br/>');
 }

 $sql = 'CREATE DATABASE IF NOT EXISTS ' . $connName;
	if($conn->query($sql) === TRUE) {
	} else {
		echo 'Nie mo&#380;na utworzy&#263; bazydanych: ' . $conn->error .'<br />';
	}

 $conn->close();

 $conn = new mysqli($connHost, $connUser, $connPass, $connName);
	if($conn->connect_error) {
		echo("Po&#322;&#261;czenie nie udane: " . $conn->connect_error . '<br/>');
	}

 $sql = "CREATE TABLE IF NOT EXISTS " . $connTableName . "(
 id INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 imie VARCHAR(30) NOT NULL,
 nazwisko VARCHAR(30) NOT NULL,
 email VARCHAR(50) NOT NULL,
 user VARCHAR(30) NOT NULL,
 password VARCHAR(50) NOT NULL
 )";
 
 if($conn->query($sql) === TRUE) {}
	else {
		echo 'Nie mo&#380;na utworzy&#263; tabeli: ' . $conn->error . '<br/>';
	}
 
if (isset($_POST['rejestracja'])) {
	$username = mysqli_real_escape_string($conn, $_POST['uName']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password_1 = mysqli_real_escape_string($conn, $_POST['pass']);
	$password_2 = mysqli_real_escape_string($conn, $_POST['rpass']);
	$imie = mysqli_real_escape_string($conn, $_POST['fName']);
	$nazwisko = mysqli_real_escape_string($conn, $_POST['lName']);
	if (empty($username)) { 
		array_push($errors, "Nazwa użytkownika wymagana"); 
	}
	if (empty($email)) {
		array_push($errors, "Adres email wymagany"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Hasło wymagane"); 
	}
	if (empty($imie)) {
		array_push($errors, "Imię wymagane"); 
	}
	if (empty($nazwisko)) {
		array_push($errors, "Nazwisko wymagane");
	}
	if ($password_1 != $password_2) {
		array_push($errors, "Hasła różnią się");
	}	
	$user_check_query = "SELECT * FROM uzytkownicy WHERE user='$username' OR email='$email' LIMIT 1";
	$wyn = mysqli_query($conn, $user_check_query);
	$user = mysqli_fetch_assoc($wyn);
	
	if ($user) {
		if ($user['user'] === $username) {
			array_push($errors, "Nazwa użytkownika jest już zajęta");
		}

		if ($user['email'] === $email) {
			array_push($errors, "Podany adres jest już zarejestrowany");
		}
	}
	
	if (count($errors) == 0) {
		$password = md5($password_1);
		$zapytanie = "INSERT INTO uzytkownicy (imie, nazwisko, email, user, password) 
		VALUES('$imie','$nazwisko','$email', '$username', '$password')";
		
		mysqli_query($conn, $zapytanie);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "Jesteś zalogowany";
		header('location: index.php');
	}
}
 
if (isset($_POST['zaloguj'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	if (empty($username)) {
		array_push($errors, "Potrzebujemy nazwe użytkownika");
	}
	if (empty($password)) {
		array_push($errors, "Potrzebujemy haslo");
	}

	if (count($errors) == 0) {
		$password = md5($password);
		$zapytanie = "SELECT * FROM uzytkownicy WHERE user='$username' AND password='$password'";
		$wynik = mysqli_query($conn, $zapytanie);
		if (mysqli_num_rows($wynik) == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Zostałeś zalogowany.";
			header('location: index.php');
		}else 
		{
			array_push($errors, "Błędnie podane nazwe użytkownika lub hasło");
		}
	}
}
	$conn->close();
?>