<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insert.php" method="post" enctype="multipart/form-data">
        <p>Kategorie: <select name="idKategorii">
            <?php
                $conn = new mysqli("localhost","root","","dzbanyv2db");
                $sql = "SELECT id, nazwa FROM kategorie ORDER BY nazwa ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) 
                {
                    while($row = $result->fetch_object()) 
                    {
                        echo "<option value='{$row->id}'>{$row->nazwa}</option>";
                    }
                } 
                else 
                {
                    echo "<option value=''>Brak kategorii</option>";
                }
            
                $conn->close();
            ?>
        </select></p>
        <p>Obrazek: <input type="file" name="obrazek"></p>    
        <p>Nazwa: <input type="text" name="nazwa"></p>
        <p>Opis: <textarea name="opis" cols="30" rows="10"></textarea></p>
        <p>Pojemność: <input type="number" name="pojemnosc"></p>
        <p>Wysokość: <input type="number" name="wysokosc"></p>
        <input type="submit" value="Dodaj Dzban">
    </form>
    
    <a href="index.php">Powrót do listy dzbanów</a>

</body>
</html>