<?php session_start(); ?>

<?php
  if (isset($_POST['login']) && isset($_POST['name']) && isset($_POST['password'])) {
    $dbserver = 'localhost';
    $dbuser = 'root';
    $connection = new mysqli($dbserver, $dbuser, '', 'mydb');

    if($connection->connect_error ) {
		die('Could not connect: ' . $connection->connect_error);
    }

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $sql = 'INSERT INTO users (name, surname, email, login, password, password2) VALUES (\''.$name.'\',\''.$surname.'\',\''.$email.'\',\''.$login.'\',\''.$password.'\',\''.$password2.'\')';
    $result = $connection->query($sql);
  } else if (isset($_POST['login']) && isset($_POST['password'])) {
  $dbserver = 'localhost';
  $dbuser = 'root';
  $connection = new mysqli($dbserver, $dbuser, '', 'mydb');


  if($connection->connect_error ) {
    die('Could not connect: ' . $connection->connect_error);
  }

  $sql = 'SELECT * FROM users WHERE login=\''.$_POST['login'].'\' and password=\''.$_POST['password'].'\'';
  $result = $connection->query($sql);
  var_dump($result);

  if ($result->num_rows > 0) {
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $_POST['login'];
  }
} else if (isset($_POST['logout'])) {
  session_start();
  $_SESSION['loggedin'] = false;
  $_SESSION['username'] = null;
}
?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
<head>
  <meta charset="utf-8" />
  <title>PHP - SPA</title>
  <link rel="stylesheet" href="spa.css">
</head>
<body>
  <main>
    <div class="strona aktywna" id="drzewa">
    <h1>HOME PAGE</h1>
    <ul>
    <li><a href="#" data-target="drzewa" class="menu">HOME PAGE</a></li>
    <li><a href="#" data-target="woda" class="menu">LOGIN PAGE</a></li>
    <li><a href="#" data-target="powietrze" class="menu">SIGNUP PAGE</a></li>
    </ul>
    <hr />
    <p>
      <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
          echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
          echo "<br>";
          echo '<form method="POST" action="#">';
          echo '<input type="hidden" name="logout">';
          echo '<input type="submit" value="logout">';
          echo "</form>";
          echo "<br>";
        } else {
            echo "Proszę się najpierw zalogować, aby zobaczyć tą stronę.";
      }
      ?>
      To jest szablon strony głównej.
    </p>
    </div>
    <div class="strona" id="woda">
    <h1>LOGIN PAGE</h1>
    <ul>
      <li><a href="#" data-target="drzewa" class="menu">HOME PAGE</a></li>
      <li><a href="#" data-target="woda" class="menu">LOGIN PAGE</a></li>
      <li><a href="#" data-target="powietrze" class="menu">SIGNUP PAGE</a></li>
    </ul>
    <hr />
    <p>
    <form action="#" method="POST">
      <label for="login">Login:</label>
      <input type="text" id="login" name="login">
      <br />
      <label for="password">Password:</label>
      <input type="password" id="password" name="password">
      <br />
      <input type="submit" value="Login">
    </form>

    <p>Nie masz konta? <a href="#" data-target="powietrze">Rejestracja</a></p>
    </p>
	
	<img src="logowanie.jfif" alt="asdasd" style=width:10%;>
	
    </div>
    <div class="strona" id="powietrze">
    <h1>SIGNUP PAGE</h1>
    <ul>
      <li><a href="#" data-target="drzewa" class="menu">HOME PAGE</a></li>
      <li><a href="#" data-target="woda" class="menu">LOGIN PAGE</a></li>
      <li><a href="#" data-target="powietrze" class="menu">SIGNUP PAGE</a></li>
    </ul>
    <hr />
    <p>
      <form action="#" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <br />

        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname">
        <br />

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br />

        <label for="login">Login:</label>
        <input type="text" id="login" name="login">
        <br />
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <br />

        <label for="password2">Confirm password:</label>
        <input type="password" id="password2" name="password2">
        <br />
        <input type="submit" value="Signup">
      </form>

      <p>Masz już konto? <a href="#" data-target="woda">Logowanie</a></p>
	  
	  <img src="rejestracja.png" alt="asdasd" style=width:20%;>
    </p>
    </div>
  </main>
  <script src="spa.js"></script>
</body>
</html>
