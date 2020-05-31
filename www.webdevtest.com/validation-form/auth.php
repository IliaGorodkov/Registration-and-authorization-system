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
$user_name= mysqli_query($mysqli,"SELECT * FROM `users` WHERE `login`=$login");

if (mysqli_num_rows($result) > 0) {
  echo '<div>Здравствуйте,вы Вошли.</div>';
  echo'<div> Вы можете выйти из Аккаунта нажав на <a href ="http://localhost/www.webdevtest.com/">
     <button class ="btn btn-success" type="submit"> Выйти </button></a></div><hr>';
}else{
  echo'Не верный логин или пароль.';
}


?>