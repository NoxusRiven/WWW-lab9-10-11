<?php
    $conn = new mysqli("localhost", "root", "", "dzbanyv2db");
    $obrazek = basename($_FILES["obrazek"]["name"]);
    move_uploaded_file($_FILES["obrazek"]["tmp_name"], "obrazki/$obrazek");
    $nazwa = $_POST["nazwa"];
    $opis = $_POST["opis"];
    $pojemnosc = $_POST["pojemnosc"];
    $wysokosc = $_POST["wysokosc"];
    $idKategorii = $_POST["idKategorii"];
    $sql = "INSERT INTO dzbany (nazwa, opis, pojemnosc, wysokosc,idKategorii) VALUES ('$nazwa', '$opis', $pojemnosc, $wysokosc, $idKategorii)";
    $conn->query($sql);
    $conn->close();
    header("location: index.php");
?>