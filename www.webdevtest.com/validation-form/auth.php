<?php
$email=filter_var(trim ($_POST['email']),
FILTER_SANITIZE_STRING);
$pass=filter_var(trim ($_POST['pass']),
FILTER_SANITIZE_STRING);

$db_host = "localhost";
$db_user = "root"; // Логин БД
$db_password = "mysql"; // Пароль БД
$db_base = 'Work'; // Имя БД
$db_table = "users";
$mysqli = mysqli_connect($db_host,$db_user,$db_password,$db_base);

$result = mysqli_query($mysqli,"SELECT * FROM `users` WHERE `email`= '$email' AND `pass`= '$pass'");

if (mysqli_num_rows($result) > 0) {
  $user = mysqli_fetch_assoc($result);
  session_start();
  $_SESSION['user'] = $user['login'];
  header('Location: http://localhost/www.webdevtest.com/');
}else{
  echo'Не верный логин или пароль. <a href="http://localhost/www.webdevtest.com/">Вернуться на главную</a>';
}

?>
