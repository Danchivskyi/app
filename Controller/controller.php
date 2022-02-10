<?php
function szukaj($liczba,$zbior){
    $stan = 0;
    for($i=0;$i<count($zbior);$i++){
        if($zbior[$i][0]==$liczba) {
            $stan=1;
            return $i;
        }
    }
    if($stan==0) return -1;
}
    require_once("./Model/model.php");
    $obiekt = new Model();
    
    $fileName = "./baza.txt";
    $fileText = $obiekt->getFileData($fileName);
    $text = [];
    $tablica1 = [];
    for($i=0;$i<strlen($fileText);$i++){
        if($fileText[$i]!==',' && $fileText[$i]!==';'){
            array_push($text,$fileText[$i]);
        }
        if($fileText[$i]==',')
        {
            $data = implode("",$text);
            array_push($tablica1,$data);
            $text = [];
        }
        if($fileText[$i]==';')
        {
            $data = implode("",$text);
            array_push($tablica1,$data);
            $obiekt->addElement($tablica1);
            $tablica1 = [];
            $text = [];
        }
    }

    $licznik = [];
    foreach($obiekt->returnStack() as $abonament)
    {   
       $index = szukaj($abonament[0],$licznik);
        if($index!=-1) {
           $licznik[$index][1] +=1;
        }
        else{
           $newElement = [$abonament[0],1];
           array_push($licznik,$newElement);
        }
    }
    require('View/view.php');
?>