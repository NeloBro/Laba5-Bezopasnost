<?php
session_start(); 
if (!$_SESSION['user']){
    header("Location: /");
}
?>

<html>
    <head>
        <title>lab</title>
    </head>
    <body>
        <h1>Привет, <?= $_SESSION['user']['login'] ?> ваш id: <?= $_SESSION['user']['id'] ?></h1>
        <a href="exit.php">Выход</a>
    </body>
</html>