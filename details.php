<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj dzban</title>
</head>
<body>
<h3>Informacje o dzbanie</h3>
<?php
    require ("session.php");
    require("db.php");

    $id = $_GET["id"];
    $sql = "SELECT AVG(ocena) AS srednia FROM recenzje WHERE idDzbana=$id";
    $result = $conn->query($sql);
    $srednia = $result->fetch_object()->srednia;

    $sql = "SELECT idKategorii, k.nazwa AS nazwaKat, d.nazwa, obrazek, d.opis, pojemnosc,wysokosc FROM dzbany d, kategorie k WHERE d.id=$id AND idKategorii=k.id";
    $result = $conn->query($sql);
    $row = $result->fetch_object();

    if($result->num_rows > 0)
    {
        echo "<p><a href='index.php'>Id kategorii: {$row->idKategorii}</a></p>";
        echo "<p>Nazwa: {$row->nazwa}</p>";
        echo "<p>Opis: {$row->opis}</p>";
        echo "<p>Pojemność: {$row->pojemnosc}</p>";
        echo "<p>Wysokość: {$row->wysokosc}</p>";
        echo "<p>Srednia recenzji: {$srednia}</p>";
        echo "<img src='obrazki/{$row->obrazek}'>";
        echo "<p><a href='updateForm.php?id={$id}'>Edytuj dzban</a></p>";
        echo "<p><a href='delete.php?id={$id}'>Usuń dzban</a></p>";
    }
    else
    {
        echo "Brak danych";
    }

    $conn->close();
?>


<h3>Dodaj nową recenzje</h3>
    <form action="insertReview.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <p>Ocena:  <select name="ocena">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select></p>
        <p>Recenzja: <textarea name="opis" cols="30" rows="10"></textarea></p>
        <input type="submit" value="Dodaj recenzje">
    </form>

    <h3>Recenzje</h3>
    <?php

        $conn = new mysqli("localhost","root","","dzbanyv2db");
        $id = $_GET["id"];
        $sql = "SELECT nick,ocena,tresc,data FROM recenzje WHERE idDzbana=$id";
        $result = $conn->query($sql);

        $index = 1;
        while($row = $result->fetch_object())
        {
            //echo "<p><b>Recenzja: $index</b></p>";
            echo "<p>Nick: {$row->nick}</p>";
            echo "<p>ocena: {$row->ocena}</p>";
            echo "<p>Treść: {$row->tresc}</p>";
            echo "<p>Data: {$row->data}</p>";
            $index++;
        }
        $conn->close();
    ?>

    <p><a href="index.php">Powrót do listy dzbanów</a></p>

</body>
</html>