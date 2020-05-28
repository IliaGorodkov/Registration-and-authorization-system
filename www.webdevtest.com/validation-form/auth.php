<?php
$email=filter_var(trim ($_POST['email']),
FILTER_SANITIZE_STRING);
$pass=filter_var(trim ($_POST['pass']),
FILTER_SANITIZE_STRING);

$pass = md5($pass."qwerty234"); 

$db_host = "localhost"; 
$db_user = "root"; // Логин БД
$db_password = "mysql"; // Пароль БД
$db_base = 'kukold'; // Имя БД
$db_table = "users"; 

$mysqli = mysqli_connect($db_host,$db_user,$db_password,$db_base);

$result = mysqli_query("SELECT * FROM `users`WHERE `email`= '$email' AND `pass`= '$pass'");

$user = $result->fetch_assoc();

if(@count ($users) == 0 ) {
  echo "Такой Пользователь не найден";
  exit();
}
print_r($users);
exit();

setcookie ('user',$users['name'], time()+3600,"/" );

$mysql ->close();

header('Location: http://localhost/www.webdevtest.com/');


?>