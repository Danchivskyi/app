<?php
    session_start();
    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="pl" dir="ltr">
<head>
  <meta charset="utf-8" />
  <title>APIS</title>
    <?php
    echo "<script>
              let id;
              fetch('http://localhost/Witaj/api/get.php?username=".$username."')
              .then(response => response.json())
              .then(data => {id = data[0]['id']})
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
      <ul class="flex">
        <h3 style="text-align:center;display:block;">Jesteś pewien, że chcesz usunąć swoje konto?</h3>
        <h5 style="text-align:center;display:block;color:firebrick;">Proces ten jest nieodwracalny.</h5>
        
        <li class="form-group">
          <button name="akt" type="button" class="btn btn-secondary" id="przycisk" style="margin:15px 0px" onClick="deleteData();return false;" href="../secure.php?logout=1">Usuń konto</button>
        </li>
      </ul>
      
    </form>
    <div id="success"></div>
  </div>
  <footer>
    Copyright &copy;<span id="year"></span> by Oleh Danchivskyi
  </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
     
      function deleteData(){
    
      const params = new URLSearchParams()
        params.append('id', id)

      axios({
        method: 'delete',
        url: 'http://localhost/Lab8Danylko/delete.php',
        data: params
      })
      .then((result) => {
         console.log(result);
         document.getElementById('success').innerHTML= "Konto zostało usunięte -> <a href='secure.php?logout=1'>Wylogouj</a>";
         document.getElementById('return').innerHTML= "<a href='secure.php?logout=1'>Powrót</a> ";
       })
       .catch((err) => {
         console.log(err);
       })
      
    }
    </script>
</html>