<?php

if (isset($_POST['name']) && isset($_POST['pass'])){

  $login = $_POST['login'];
  $name= $_POST['name'];
  $pass =$_POST['pass'];

  
  $db_host = "localhost"; 
  $db_user = "root"; // Логин БД
  $db_password = "mysql"; // Пароль БД
  $db_base = 'register-bd'; // Имя БД
  $db_table = "users"; 




  $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

 if ($mysqli->connect_error) {
  die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
 }

 $result = $mysqli->query("INSERT INTO ".$db_table." (users) VALUES ('$name','$pass')");

 if ($result == true){
	echo "Информация занесена в базу данных";
 }else{
	echo "Информация не занесена в базу данных";
 }

}



if(mb_strlen($login)< 5 || mb_strlen($login) > 90) {
  echo"Недопустимая Длинна Логина";
  exit();
  } else if (mb_strlen($name) <3|| mb_strlen($name)>40){
    echo"Недопустимая Длинна Имени ";
  exit();
  }
  else if (mb_strlen($pass) < 2 || mb_strlen($pass)> 10) {
    echo"Недопустимая Длинна Пороля";
  exit();
  }

$pass = md5($pass."qwerty234");



?>