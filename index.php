<!doctype html>
<html lang="pl" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sieć Ładowarek</title>
  <link rel="stylesheet" href="styles/style.css">
  <script src="script.js" ></script>
  <link rel="icon" type="images/jpg" href="favicon.jpg">
</head>

<body>

<!--Nagłówek-->
  <header id="logo">
    <p>Sieć Ładowarek "Volt"</p>
  </header>
  <!---->
  <main>
  
  <!--Prawe menu "MENU"-->
  
  <!--Rejestracja oraz logowanie-->
	<?php
		session_start();

		if(!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "Nie jesteś zalogowany";
		}

		if(isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
		}
	?>
	
    <nav class="navigation">
	<?php if(!isset($_SESSION['username'])) : ?>
		<?php
			echo '<li><a href="register.php">Rejestracja</a></li></ul>';
			echo '<p>Nie jesteś zalogowany. <p>Proszę się zalogować.<li><a href="login.php"><br>Zaloguj się.</a></li></p>';
		?>
	<?php endif ?>
				
					
	<?php if(isset($_SESSION['success'])) : ?>
		<div class="error success" >
			<?php
				echo $_SESSION['success'];
				unset($_SESSION['success']);
			?>
		</div>
	<?php endif ?>

	<?php if(isset($_SESSION['username'])) : ?>
		<p>Witaj
			<strong>
				<?php echo " " . $_SESSION['username']; ?>
			</strong>
			
			<p><a href="index.php?logout='1'" style="color: yellow;">Wyloguj</a>
	<?php endif ?>
	<!---->
	
	<!--Tłumaczenie menu-->
      <h3>MENU</h3>
      <div class="menu"></div>
      <div class="language"></div>
    </nav>

	
    <section>
      <h3 id="strona-glowna">Proszę sprawdzić działanie menu.</h3>
      <noscript><p>Twoja przeglądarka nie obsługuje JavaScript. Upewnij się, że w przeglądarce masz włączoną obsługę JavaScript.</p></noscript>
	</section>
	<!---->
	
	<div id="container">	
	
<!--Czesc Cennikowa-->
<section>
<div id="content">
 <section>
  <h2>Cennik</h2>
   <table>
    <thead>
     <tr>
      <th id="marka">Marka</th>
	  <th>Zasilanie</th>
	  <th>Waga</th>
	  <th>Wymiary</th>
	  <th>Moc(w kW)</th>
	  <th>Gwarancja (w latach)</th>
	  <th>Cena w zł</th>
	 </tr>
	</thead>
<!---->

<!--Dane Cennika(ładowarki oraz ile kosztują)-->
	<tbody>
		<tr>
			<td>Wallbox Pulsar</td>
			<td>3-fazowe</td>
			<td>5 kg</td>
			<td>166x163x82mm</td>
			<td>22 kW</td>
			<td>2 lata</td>
			<td>2980 zł</td>
		</tr>
		<tr>
			<td>SMA EV</td>
			<td>3-fazowe</td>
			<td>8 kg</td>
			<td>460x357x122mm</td>
			<td>22 kW</td>
			<td>2 lata</td>
			<td>7080 zł</td>
		</tr>
		<tr>
			<td>Mennekes Amtron</td>
			<td>3-fazowe</td>
			<td>5 kg</td>
			<td>475x220x259mm</td>
			<td>22 kW</td>
			<td>3 lata</td>
			<td>7950 zł</td>
		</tr>
		<tr>
			<td>Mennerkes Amtron Compact</td>
			<td>3-fazowe</td>
			<td>5 kg</td>
			<td>361x207x146mm</td>
			<td>11 kW</td>
			<td>1 rok</td>
			<td>3160 zł</td>
		</tr>
		<tr>
			<td>Ensto One EVH32-HC000</td>
			<td>1-fazowe</td>
			<td>5.5 kg</td>
			<td>361x202x142mm</td>
			<td>7.4 kW</td>
			<td>1 rok</td>
			<td>2950 zł</td>
		</tr>
	</tbody>
   </table>
 </section> 
</div>
</section>
<!---->


<!--Galeria-->
<section id="gal">
<div id="gal">
<h2>Galeria</h2>
<figure>
	<img src="images/charge.jpg" alt="asdasd" style=width:35%;>
	<figcaption>Zdjęcie 1.Ładowanie samochodu</figcaption>	
</figure>
</div>
</section>
<!---->

<!--Komentarze oraz opinie-->
<section>
<div id="coments">
	<h2>Komentarze oraz opinie</h2>
	
	<div class="komentarze">
		<article class="opinia">
			<h4>Komentarz 1</h4>
			<p>Witam. Tutaj znajduje się pierwszy komentarz. Opinia na ten temat znajduje się też tutaj.</p>
		</article>
		
		<article class="opinia">
			<h4>Komentarz 2</h4>
			<p>Witam. Tutaj znajduje się drugi komentarz. Opinia na ten temat znajduje się też tutaj.</p>
		</article>

		<article class="opinia">
			<h4>Komentarz 3</h4>
			<p>Witam. Tutaj znajduje się trzeci komentarz. Opinia na ten temat znajduje się też tutaj.</p>
			</article>

		<article class="opinia">
			<h4>Komentarz 4</h4>
			<p>Witam. Tutaj znajduje się czwarty komentarz. Opinia na ten temat znajduje się też tutaj.</p>
		</article>

		<article class="opinia">
			<h4>Komentarz 5</h4>
			<p>Witam. Tutaj znajduje się piąty komentarz. Opinia na ten temat znajduje się też tutaj.</p>
		</article>
	</div>
</div>
</section>
<!---->

<!--Formularz kontaktowy-->
<section>
<div id="contact">
	<h2>Kontakt</h2>
	<form action="index.html" method="GET">
		<table>
			<tr>
				<td><label for="name">Imie i nazwisko:</label></td>
				<td><input type="text" name="name" id="name" size="25" placeholder="Jan Kowalski"/></td>
			</tr>

			<tr>
				<td><label for="nr_phone">Numer telefonu:</label></td>
				<td><input type="text" id="nr_phone" name="nr_phone" size="30" placeholder="123-456-678" /></td>
			</tr>
 
			<tr>
				<td><label for="mail">E-mail:</label></td>
				<td><input type="text" id="mail" name="mail" size="30" placeholder="nazwa@domena.tld" /></td>
			</tr>

			<tr>
				<td><label for="temat">Temat:</label></td>
				<td><input type="text" name="temat" id="temat" required placeholder="Temat"/></td>
			</tr>

			<tr>
				<td><label for="message">Wiadomość:</label></td>
				<td><input type="text" id="message" name="message" size="45" placeholder="Wiadomość do nas"/></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" value="Wyślij"/></td>
			</tr>

		</table>
	</form>
</div>
</section>
<!---->


<!--Reklama w której znajdują się wideo-->
<section>
<div id="advertisement">
	<h2>Reklama</h2>
		<video height="300" controls>
			<source src="kkkk.mp4" type="video/mp4"></source>
		</video>
</div>
</section>
<!---->

<!--Infromacja o firmie-->
<section>
<div id="about">
	<h1>Trochę informacji o nas</h1>
	<h2>Stacje ładowania samochodów elektrycznych</h2>
			<p>
			Oferujemy sprzedaż, serwis stacji ładujących samochody elektryczne. 
			Nasze wallboxy to wysokiej jakości produkty, objęte 2 letnią gwarancją 
			u polskiego dostawcy. Doradzamy w wyborze odpowiedniej stacji ładującej 
			do domu, hotelu, firmy z uwzględnieniem możliwości Państwa sieci elektrycznej.
			</p>
			
		<h2>Jaki samochód naładujesz?</h2>
			<p>
			Nasze ładowarki mogą zasilać każde auto elektryczne (zwanym EV) lub 
			hybrydy plug-in. Zarówno pochodzące z sieci europejskich dealerów jak 
			i z USA. Auta europejskie podłączamy wtykiem o oznaczeniu Type 2 a z 
			USA Type 1. Do obu rodzajów gniazd i wtyków posiadamy rozwiązania, 
			zarówno ładowarki przenośne, ładowarki Wallbox jak kable i adaptery 
			pomagające podłączyć auto np. z USA.
			</p>
			
			<p>
			Niepełna lista samochodów do których możesz zakupić u nas ładowarkę:Audi E-tron quattro / Audi e-tron Sportback,
			BMW I3 / BMW I3S / BMW I3 Rex, Chevrolet Bolt, Chevrolet Spark, Citroen Berlingo EV,
			Citroen C-zero,Fiat 500e,Focus EV,Honda Clarity EV,Hyundai Ioniq EV,
			Hyundai Kona,Jaguar I-PACE,Kia Niro,Kia Soul,Mercedes B klasa EV,
			Mitsubishi I-MIEV,Nissan LEAF,Nissan e-NV200,Opel Ampera- e,Peugeot iON,
			Peugeot Partner EV,Renault ZOE,Renault Twizzy ,Renault Kangoo Z.E,Smart ForTwo EV,
			Tesla Model S,Tesla Model X,Tesla Model 3,Toyota RAV4 EV,Volkswagen E-Golf,
			Volkswagen E-UP.
			</p>
</div>
</section>
<!---->

<!--Firmowa Wizytowka-->
<section class="main-content">
    <div>
        <?php
          $data = array(
            'iin' => 'Oleh Danchivskyi',
            'nazwaFirmy' => 'Politechnika Rzeszowska',
            'stanowisko' => 'Student',
            'adres' => 'Akademicka 3, 35-084 Rzeszow, Polska',
            'email' => 'olehdanchivskyi@prz.edu.pl',
            'telefon' => '577 217 214'
          );
          print('<b>Firmowa Wizytówka</b>');
          print('<br>'.$data['iin']);
          print('<br>'.$data['nazwaFirmy']);
          print('<br>'.$data['stanowisko']);
          print('<br>'.$data['adres']);
          print('<br>'.$data['email']);
          print('<br>'.$data['telefon']);
        ?>
        <br><br><br>
    </div>
</section>	 
 
<!--Kalkulator zliczania powtórzeń-->
<section id="kalkulator">
    <div id="formularz">
        <form action="index.php" method="POST" style="width:400px;">
            <label for="tarifa">Taryfa:</label>
                <select name="tarifa" class="form-select">
                    <?php
                        $json_data = file_get_contents('table.json');
                        $cennikArray = json_decode($json_data, true);
                        foreach ($cennikArray['taryfy'] as $taryfa) {
                            echo '<option value="'.$taryfa['value1'].'">'.$taryfa['value1'].'</option>>';
                        }
                    ?>
                    </select><br/>
                        
                    <label  for="liczba">Gwarancja w latach:</label>
                    <input class="form-control" type="text" name="liczba" size=5 maxsize=5 value="1"/><br />
                    <input class="btn btn-secondary" type="submit" name="oblicz" id="przycisk" value="Oblicz"/>
        </form>
    <div id="wynik">
    
	<?php
        if(isset($_POST['oblicz'])){
            $tarifa = $_POST['tarifa'];
            $liczba = $_POST['liczba'];
            foreach($cennikArray['taryfy'] as $element){
                if($tarifa == $element['value1']){
                    $data = $tarifa.",".$liczba.",".($liczba*$element['value7']).";";
                    echo "<br><left>Abonament w taryfie ".$tarifa." na ".$liczba." rok/lat, wynosi ".($liczba*$element['value7'])."</left><br>";  
                    $fileName = "baza.txt";
                    $file = fopen($fileName, "a+") or die("Nie można otworzyć pliku!");
                    fwrite($file, $data);
                    fclose($file);
                    }
            } 
        }
		require('Controller/controller.php');
    ?>
    </div>
    <div id="odpowiedz"></div>
    </div>
</section>
<hr/>
<!---->
		 
<!--Liczba Fibonnaciego-->
<br><br>
<div>
    <form action="obliczenia.php" method="POST">
		<label for="liczba">Liczba:</label>
		<input type="text" name="liczba" size=5 maxsize=5 />
		<br />
		<input type="submit" name="oblicz" id="przycisk" value="Oblicz" />
    </form>
</div>

<br><br>
<br />

<p id="demo"></p>
<noscript><p>Twoja przeglądarka nie obsługuje JavaScript. Upewnij się, że w przeglądarce masz włączoną obsługę JavaScript.</p></noscript>
</section>
<hr />
<!---->


</div>
  </main>
  
  <!--Opasek dolny-->
  <footer>
  	<aside>
		<nav style="background-color: silver;">
			<ul>
				<li><a href="#top">Powrót na górę</a></li>
				<li><a href="#gal">Galeria</a></li>
				<li><a href="#advertisement">Wideo</a></li>
				<li><a href="#contact">Kontakty</a></li>
				<li><a href="#about">O stronie</a></li>
			</ul>
		</nav>
		
		
		
	</aside>
    <small>&copy; Copyright 2021, Oleh Danchivskyi</small>
	<div id="stopka"></div>    <!--Pole odpowiadające za rok w stopce-->
  </footer>

  <script>
    loadMenu(localStorage.getItem('lang') || 'pl')
  </script>
</body>
</html>
