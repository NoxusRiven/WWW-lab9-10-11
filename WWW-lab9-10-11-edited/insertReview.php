<?php
    $conn = new mysqli("localhost","root","","dzbanyv2db");
    $id = $_POST["id"];
    $nick = $_POST["nick"];
    $ocena = $_POST["ocena"];
    $recenzja = $_POST["opis"];
    $sql = "INSERT INTO recenzje (idDzbana, nick, ocena, tresc) VALUES ($id, '$nick', $ocena, '$recenzja')";
    $conn->query($sql);
    $conn->close();
    header("location: details.php?id={$id}");
?>