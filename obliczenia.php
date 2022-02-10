<!DOCTYPE html>
<html lang="pl" dir="ltr">
<head>
 <meta charset="utf-8">
 <title>PHP - funkcje</title>
</head>
<body>
  <?php
    if(isset($_POST['oblicz'])) $liczba = $_POST['liczba'];
    else $liczba = 0;

    function fib ($n) {
      if ($n == 0) return 0;
      else if ($n == 1) return 1;
      return (fib($n - 1) + fib($n - 2));
    }

    function ciagLiczbowy ($ilosc) {
      $kontynuacja = ($ilosc == 0) ? 0 : 1;

      if ($kontynuacja == 1) {
        echo "Ci&#261;g liczb od 0 do " . $ilosc . ": ";
        if ($ilosc > 0) {
          for ($i=0; $i <= $ilosc; $i++) echo "$i ";
        } else {
          for ($i=0; $i >= $ilosc; $i--) echo "$i ";
        }

        print('<br>');

        for ($i=0; $i <= $ilosc; $i++) print('<br>'.$i.' elementem ciagu Fibonacciego jest '.fib($i).'');
      } else echo "Wprowadzona liczba to 0";
    echo "<br /><br />";
  }

  ciagLiczbowy($liczba);
  ?>
</body>
</html>
