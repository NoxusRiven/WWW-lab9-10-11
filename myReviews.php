<?php
    require ("session.php");
    require("db.php");

    $sql = "SELECT ocena, tresc, r.data ,d.id AS idDzbana, nazwa FROM recenzje r, dzbany d, uzytkownicy u WHERE d.id = idDzbana AND r.nick = u.login";
    $result = $conn->query($sql);

    echo "<p>Ulubione dzbany</p>";
    if($result->num_rows>0)
    {
        while($row = $result->fetch_object())
        {
            echo "<p>ID Dzbana: {$row->idDzbana}</p>";
            echo "<p>ocena: {$row->ocena}</p>";
            echo "<p>Treść: {$row->tresc}</p>";
            echo "<p>Data: {$row->data}</p>";

        }
        $conn->close();
    }
    else
    {
        echo "Brak danych";
    }
?>