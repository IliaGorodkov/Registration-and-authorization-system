<?php
$login=filter_var(trim ($_POST['login']),
FILTER_SANITIZE_STRING);
$pass=filter_var(trim ($_POST['pass']),
FILTER_SANITIZE_STRING);

$pass = md5($pass."qwerty234"); 

$mysql = new mysqli ('localhost','qwer','','qwer');

$result = $mysql -> query("SELECT * FROM `users`WHERE `login`= '$login' AND `pass`= '$pass'");

$users = $result->fetch_assoc();

if(@count ($users) == 0 ) {
  echo "Такой Пользователь не найден";
  exit();
}

setcookie ('user',$users['name'], time()+3600,"/" );

$mysql ->close();

header('Location: http://localhost/www.webdevtest.com/');


?>