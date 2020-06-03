<?php
$db_host = "localhost";
$db_user = "root"; // Логин БД стандартный
$db_password = "mysql"; // Пароль БД или его нет
$db_base = "Work"; // Имя БД

$s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
$user = json_decode($s, true);
if (!$user) exit;
if (!$user['email'] || !$user['first_name']) {
    echo "Error: Email address and First Name are required.";
    exit;
}

// Connecting to MySQL
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_base);
if ($mysqli->connect_errno) {
    echo "Error: Connection problem with MySQL database.";
    exit;
}


// Searching for record with the same email
$sql = "SELECT `email` FROM `users` WHERE `email` = '" . $user['email'] . "';";
$result = $mysqli->query($sql);
if (!$result) {
    echo $mysqli->error;
    exit;
}

// If record exists - login user
if ($result->num_rows > 0) {
    session_start();
    $_SESSION['user'] = $user['first_name'];
    header('Location: http://localhost/www.webdevtest.com/');
    exit;
}

// If record does not exist - register and login user
$sql = "INSERT INTO `users` (`email`, `login`, `pass`) VALUES ('" . $user['email'] . "', '" . $user['first_name'] . "', 'no_password');";
if (!$result = $mysqli->query($sql)) {
    echo $mysqli->error;
    exit;
}

session_start();
$_SESSION['user'] = $user['first_name'];
header('Location: http://localhost/www.webdevtest.com/');
?>
