<?php
    $conn = new mysqli("localhost", "root", "", "dzbanyv2db");
    $id = $_GET["id"];
    $sql = "DELETE FROM dzbany WHERE id=$id";
    $conn->query($sql);
    $conn->close();
    header("location: index.php");
?>