<?php
    require("session.php");
    require("db.php");
?>
<p>
    Witaj <?= $_SESSION["login"] ?>!
    <p><a href="myReviews.php">Moje recenzje</a></p>
    <p><a href="index.php">Strona głowna</a></p>
    <p><a href="favourities.php">Ulubione</a></p>
    <p><a href="logout.php">Wyloguj</a></p>
</p>