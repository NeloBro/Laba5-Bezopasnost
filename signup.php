<?php 
session_start();

require_once 'connect.php';

$login = $_POST['login'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if($password != $password2){
	die("Пароли не совпадают");
}

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

mysqli_query($connect, "INSERT INTO `users` (`login`, `password`) VALUES ('$login', '$password')");
header("Location: /");


?>