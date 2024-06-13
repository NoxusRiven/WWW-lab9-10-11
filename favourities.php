<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require("session.php");
        require("db.php");

        $idUzytkownika = $_SESSION["id"];
        $sql = "SELECT d.id, d.nazwa, d.obrazek FROM dzbany d, ulubione u WHERE u.idDzbana = d.id AND idUzytkownika = $idUzytkownika";
        $result = $conn->query($sql);

        echo "<p>Ulubione dzbany</p>";
        if($result->num_rows > 0)
        {
            echo "<table>";
            while($row = $result->fetch_assoc())
            {
                echo "<tr>";
                echo "<td><a href='details.php?id={$row["id"]}'><img src='{$row["obrazek"]}' alt='{$row["nazwa"]}'></a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "Brak danych";
        }
        $conn->close();
    ?>
</body>
</html>