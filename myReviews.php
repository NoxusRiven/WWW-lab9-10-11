<?php
    require ("session.php");
    require("db.php");

    $sql = "SELECT ocena, tresc, data, d.id AS idDzbana, nazwa FROM recenzje r, dzbany d WHERE d.id = idDzbana";

    $result = $conn->query($sql);

        while($row = $result->fetch_object())
        {
            //echo "<p>Nick: {$row->nick}</p>";
            if($row->nick==$_SESSION["login"])
            {
                echo "<p>ocena: {$row->ocena}</p>";
                echo "<p>Treść: {$row->tresc}</p>";
                echo "<p>Data: {$row->data}</p>";
            }
        }
        $conn->close();
?>
