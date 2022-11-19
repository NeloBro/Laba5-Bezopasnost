<?php 
session_start();

require_once 'connect.php';

$login = $_POST['login'];
$password = $_POST['password'];

if (preg_match("/[0-9]|CREATE|ALTER|DROP|SELECT|INSERT|UPDATE|DELETE|GRANT|REVOKE/i", $login)) {
    die("Логин не соответствует требованиям");
}
if(strlen($login)<3) {
    die("Логин слишком маленький");
}
elseif (strlen($login)>64) {
    die("Логин слишком большой");
}

if (preg_match("/[0-9]|CREATE|ALTER|DROP|SELECT|INSERT|UPDATE|DELETE|GRANT|REVOKE/i", $password)) {
    die("Пароль не соответствует требованиям");
}
if(strlen($password)<3) {
    die("Пароль слишком маленький");
}
elseif (strlen($password)>64) {
    die("Пароль слишком большой");
}

$password = md5($password);

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
if(mysqli_num_rows($check_user)>0) {
    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user'] = [
        "id" => $user['id'],
        "login" => $user['login']
    ];
}
    header("Location: profile.php")




?>