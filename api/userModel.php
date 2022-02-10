<?php
class userModel extends Db {
 private static $dbTableName = "uzytkownicy";

 public function znajdzUzytkownika($username) {
    $sql = "SELECT id,imie,nazwisko,email,user FROM " . self::$dbTableName . " WHERE user = ? ";
    $polecenie = $this->conn()->prepare($sql);
    $polecenie->execute([$username]);

    $dane = $polecenie->fetchAll();
    exit(json_encode($dane));
    }

 public function edytujUzytkownika($id, $imie, $nazwisko, $email, $uzytkownik,$haslo) {
    $licznik = 0;

    $sql = "UPDATE " . self::$dbTableName . " SET ";
    if($imie != NULL) {
        $licznik++;
        $sql = $sql . "imie = :imie";
    }
    if($nazwisko != NULL) {
        if($licznik > 0) {
            $sql = $sql . " , ";
        }
        $licznik++;
        $sql = $sql . "nazwisko = :nazwisko";
    }
    if($email != NULL) {
        if($licznik > 0) {
            $sql = $sql . " , ";
        }
        $licznik++;
        $sql = $sql . "email = :email";
    }
    if($uzytkownik != NULL) {
        if($licznik > 0) {
            $sql = $sql . " , ";
        }
        $licznik++;
        $sql = $sql . "user = :uzytkownik";
    }
    if($haslo != NULL) {
        if($licznik > 0) {
            $sql = $sql . " , ";
        }
        $licznik++;
        $sql = $sql . "password = :haslo";
    }
    $sql = $sql . " WHERE id = :id";
    $polecenie = $this->conn()->prepare($sql);
    if($imie != NULL) {
        $polecenie->bindParam(':imie', $imie);
    }
    if($nazwisko != NULL) {
        $polecenie->bindParam(':nazwisko', $nazwisko);
    }
    if($email != NULL) {
        $polecenie->bindParam(':email', $email);
    }
    if($uzytkownik != NULL) {
        $polecenie->bindParam(':uzytkownik', $uzytkownik);
    }
    if($haslo != NULL) {
        $polecenie->bindParam(':haslo', $haslo);
    }
    $polecenie->bindParam(':id', $id);

    if($polecenie->execute()) {
        exit(json_encode(array("status" => 'success')));
    }
    else {
        exit(json_encode(array("status" => 'failed', 'reason' => 'Błąd przy edytowaniu użytkownika')));
    }
}

public function usunUzytkownika($id) {
    $sql = "DELETE FROM " . self::$dbTableName . " WHERE id = ?";
    $polecenie = $this->conn()->prepare($sql);
    if($polecenie->execute([$id])) {
        exit(json_encode(array("status" => 'success')));
    }
    else {
    exit(json_encode(array("status" => 'failed', 'reason' => 'Błąd przy kasowaniu użytkownika')));
    }
}
}
?>