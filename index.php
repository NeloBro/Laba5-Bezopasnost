<?php
session_start(); 
if ($_SESSION['user']){
    header("Location: profile.php");
}
?>

<html>
    <head>
        <title>lab</title>
    </head>
    <body>
        <form action="signin.php" method="post">
            <label>Логин</label>
            <input type="text" name="login">
            <label>Пароль</label>
            <input type="password" name="password">
            <button>Войти</button>
            <a href="registration.php">Зарегестрироватся</a>
        </form>
    </body>
</html>