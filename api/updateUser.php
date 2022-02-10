<?php
    session_start();
    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="pl" dir="ltr">
<head>
  <meta charset="utf-8" />
  <title>API</title>
  <?php
    echo "
    <script>
        let id,username;
        fetch('http://localhost/Witaj/api/get.php?username=".$username."')
        .then(response => response.json())
        .then(data => {
          console.log(data);
          id = data[0]['id'];
          username = data[0]['user']
        })
    </script>";
    ?>  
</head>
<body>
  <header>
    <h2>Aktualizacja danych użytkownika</h2>
    <hr /> 
</header>
  <div id="formularz">
    <form>
      <section class="flex">
        <div class="form-group">
          <label for="fName" class="input-group-text" style="width:300px;">Imie:</label>
          <input type="text" id="fName" value="" class="form-control" size=20 maxsize=30 required /><br />
        </div>
        <div class="form-group">
          <label for="lName" class="input-group-text" style="width:300px;">Nazwisko:</label>
          <input type="text" id="lName" class="form-control" size=20 maxsize=30 required /><br />
        </div>
        <div class="form-group">
          <label for="email" class="input-group-text" style="width:300px;">Email:</label>
          <input type="email" id="email" class="form-control" size=20 maxsize=50 required /><br />
        </div>
        <div class="form-group">
          <label for="pass" class="input-group-text" style="width:300px;">Hasło:</label>
          <input type="password" id="pass" class="form-control" size=20 maxsize=50 required /><br />
        </div>
        <div class="form-group">
          <button name="akt" type="button" class="btn btn-secondary" id="przycisk" onClick="updateData();return false;">Zaktualizuj</button>
        </div>
      </section>
    </form>
    <div id="success"></div>
  </div>
  <footer>
    Copyright &copy;<span id="year"></span> by Oleh Danchivskyi
  </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function updateData(){
        var fName = document.querySelector("#fName").value;
        var lName = document.querySelector("#lName").value;
        var email = document.querySelector("#email").value;
        var pass = document.querySelector("#pass").value;
        console.log(username)
        
      const params = new URLSearchParams()
        params.append('id', id)
          params.append('fName', fName)
          params.append('lName', lName)
          params.append('email', email)
          params.append('uName', username)
          params.append('pass', pass)
    axios({
        method: 'put',
        url: 'http://localhost/Lab8Danylko/put.php',
        data: params
      })
      .then((result) => {
         console.log(result);
         document.getElementById('success').innerHTML = "Pomyślnie zaktualizowano dane użytkownika";
       })
       .catch((err) => {
         console.log(err);
       })}
    </script>
</html>