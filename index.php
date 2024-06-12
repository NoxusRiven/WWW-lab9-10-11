<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dzbanów</title>
</head>
<body>
    <?php
        require("menu.php");

        $sql = "SELECT id, nazwa FROM kategorie";
        $result = $conn->query($sql);

        echo "<a href='index.php'>Wszystkie </a>";
        while($row = $result->fetch_object()) 
        {
            echo "<a href='index.php?idKat={$row->id}'>{$row->nazwa} </a>";
        }
        $conn->close();
    ?>
    <form>
        <p>
            <input type="text" name="fraza">
            <input type="submit" value="Wyszukaj">
        </p>
    </form>

    <a href="insertForm.php">Dodaj dzban</a>

    <?php
        $conn = new mysqli("localhost", "root", "", "dzbanyv2db");
        $sql = "SELECT id, nazwa, obrazek FROM dzbany";
        if (isset($_GET["idKat"])) 
        {
            $idKat = $_GET["idKat"];
            $sql .= " WHERE idKategorii = $idKat";
        }
        elseif (isset($_GET["fraza"])) 
        {
            $fraza = $_GET["fraza"];
            $sql .= " WHERE nazwa LIKE '%$fraza%'";
        }

        $result = $conn->query($sql);

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