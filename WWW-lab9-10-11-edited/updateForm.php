<?php
    $conn = new mysqli("localhost", "root", "", "dzbanyv2db");
    $id = $_GET["id"];
    $sql = "SELECT id, nazwa, opis, pojemnosc, wysokosc, idKategorii FROM dzbany WHERE id=$id";
    $result = $conn->query($sql);
    $dzban = $result->fetch_object();
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj dzban</title>
</head>
<body>
    <h1>Edytuj dzban</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <p>Kategorie: <select name="idKategorii">
            <?php
                $conn = new mysqli("localhost","root","","dzbanyv2db");
                $sql = "SELECT id, nazwa FROM kategorie ORDER BY nazwa ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) 
                {
                    while($row = $result->fetch_object()) 
                    {
                        $selected = ($row->id == $dzban->idKategorii) ? "selected" : "";
                        echo "<option value='{$row->id}' $selected>{$row->nazwa}</option>";
                    }
                } 
                else 
                {
                    echo "<option value=''>Brak kategorii</option>";
                }
            
                $conn->close();
            ?>
        </select></p>
        <p>Obrazek: <input type="file" name="obrazek" value="<?php echo $dzban->obrazek ?>"></p> 
        <p>Nazwa: <input type="text" name="nazwa" value="<?php echo $dzban->nazwa; ?>"></p>
        <p>Opis: <textarea name="opis" cols="30" rows="10"><?php echo $dzban->opis; ?></textarea></p>
        <p>Pojemność: <input type="number" name="pojemnosc" value="<?php echo $dzban->pojemnosc; ?>"></p>
        <p>Wysokość: <input type="number" name="wysokosc" value="<?php echo $dzban->wysokosc; ?>"></p>
        <input type="submit" value="Zapisz zmiany">
    </form>
    <p><a href="details.php?id=<?php echo $id; ?>">Anuluj</a></p>
</body>
</html>
