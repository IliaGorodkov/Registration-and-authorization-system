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
$mysqlii = mysqli_connect($db_host,$db_user,$db_password,$db_base);

$result = mysqli_query($mysqlii,"SELECT * FROM `users` WHERE `email`= '$email' AND `pass`= '$pass'");

if (mysqli_num_rows($result) > 0) {
  echo '<div>Здравствуйте,вы Вошли.</div>';
  echo'<div> Вы можете выйти из Аккаунта нажав на <a href ="http://localhost/www.webdevtest.com/">
     <button class ="btn btn-success" type="submit"> Выйти </button></a></div><hr>';
}else{
  echo'Не верный логин или пароль.';
}



$s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
$user = json_decode($s, true);
if (!$user) exit;
if (!$user['email'] || !$user['first_name']) {
    echo "Error: Email address and First Name are required.";
    exit;
}

// Connectibg to MySQL
$mysqli3 = new mysqli('localhost', 'root', 'mysql', 'Work');
if ($mysqli3->connect_errno) {
    echo "Error: Connection problem with MySQL database.";
    exit;
}


// Searching for record with the same email
$sql = "SELECT `email` FROM `users` WHERE `email` = '" . $user['email'] . "';";
$result = $mysqli->query($sql);
if (!$result) {
    echo "Internal Server Error";
    exit;
}

// If record exists - login user
if ($result->num_rows > 0) {
    session_start();
    $_SESSION['user'] = $user['first_name'];
    header('Location: index.php');
    exit;
}

// If record does not exist - register and login user
$sql = "INSERT INTO `users` (`email`, `first_name`) VALUES ('" . $user['email'] . "', '" . $user['first_name'] . "');";
if (!$result = $mysqli->query($sql)) {
    echo "Internal Server Error";
    exit;
}

session_start();
$_SESSION['user'] = $user['first_name'];
header('Location: index.php');







?>