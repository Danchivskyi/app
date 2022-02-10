<?php include('secure.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Logowanie</title>
</head>
<body>
  <div class="header">
  	<h2>Logowanie</h2>
	<hr />
  </div>
  
	<div id="formularz">
		<form method="post" action="login.php">
		
		<div class="flex">
			<div class="form-group">  
				<label for="login">Login:</label>
				<input type="text" name="username" >
			</div>
			
			<div class="form-group">
				<label for="haslo">Hasło:</label>
				<input type="password" name="password">
			</div>
		</div>
		
		<div class="form-group">
			<button type="submit" id="przycisk" name="zaloguj">Login</button>
		</div>
			
		<div id="error">
			<?php if(count($errors) > 0) : ?>
			<?php foreach($errors as $error) : ?>
			<p><?php echo $error ?></p>
			<?php endforeach ?>
			<?php endif ?>
		 </div>
		
		<p>Nie masz jeszcze konta?<a href="register.php">Zarejestruj się</a>
		
		</form>
	</div>
</body>
</html>