<!DOCTYPE html> 
<html lang="pl" dir="ltr"> 
    <head> 
        <meta charset="UTF-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1" /> 
        <title>TWiJ - laboratorium 6</title> 
        <link rel="stylesheet" type="text/css" href="style.css" /> 
    </head> 
    <body> 
            <?php 
            echo "<br/>
            <table class='kalkulator'>
            <thead>
                <th>Nazwa abonamentu</th>
                <th>Liczba powtórzeń</th>
            </thead>";
            foreach($licznik as $element){
                print "<tr><td>".$element[0]."</td><td>".$element[1]."</td></tr>";
            }
            echo "</table>";
            ?>
    </body> 
</html>