<?php
    $conn = new mysqli("localhost", "root", "", "dzbanyv2db");
    $id = $_POST["id"];
    $nazwa = $_POST["nazwa"];
    $opis = $_POST["opis"];
    $pojemnosc = $_POST["pojemnosc"];
    $wysokosc = $_POST["wysokosc"];
    $idKategorii = $_POST["idKategorii"];
    $sql = "UPDATE dzbany SET nazwa='$nazwa', opis='$opis', pojemnosc=$pojemnosc, wysokosc=$wysokosc, idKategorii=$idKategorii WHERE id=$id";
    $conn->query($sql);
    $conn->close();
    header("location: details.php?id=$id");
?>
