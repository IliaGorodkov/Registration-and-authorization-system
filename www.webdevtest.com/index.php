<?php session_start() ?>
<!DOCTYPE html>
<html lang ="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ULogin Test</title>
    <script src="//ulogin.ru/js/ulogin.js"></script>
    <script>

    </script>
</head>
<body>
    <?php if (isset($_SESSION['user'])) { ?>
        <div>Привет, <?=$_SESSION['user']?></div>
        <button onclick="location.href = 'logout.php'">Выйти</button>
    <?php } else { ?>
        <div data-ulogin="display=panel;fields=first_name,email;providers=vkontakte,odnoklassniki,mailru,
        facebook;hidden=twitter,google,yandex,livejournal,openid,lastfm,linkedin,liveid,soundcloud,steam,
        flickr,uid,youtube,webmoney,foursquare,tumblr,googleplus,vimeo,instagram,wargaming;redirect_uri=http%3A%2F%2Flocalhost%2Fauth.php"></div>
    <?php } ?>
</body>
</html>
<head>
  <meta charset  = "UTF-8">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content = "ie=edge">
  <title>Форма Регистрации</title>  
  <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href ="css/style.css">
</head>
<body>
  <div class = "container mt-1" ><br>
  <?php
   if ($_COOKIE['user'] == ''):
  ?>
   <div class = "row">
   <font face="Helvetica"> 
   <font size="+3" style= "color: green">Регистрация</font>
    <DIV STYLE="font-size:15px; font-weight: bold">
    <form action="validation-form/check.php" method = "post"><br>
     <input type = "text" class = "form-control"name= "login" id= "login" placeholder="Введите Логин"><br>
     <input type = "text" class = "form-control"name= "email" id= "email" placeholder="Введите ваш Email"><br>
     <input type = "password" class = "form-control"name = "pass" id= "pass" placeholder="Введите Пароль" ><br>
     <input type = "password2" class ="form-control"name = "pass2" id= "pass2" placeholder="Введите еще раз Пароль"><br>
     <button class ="btn btn-success" type="submit">Зарегистрироваться</button>
   </form><br>
</div>
<div class = "col">
  <font size="+3" style= "color: green">Авторизация</font>
    <form action="validation-form/auth.php" method = "post"><br>
   <input type = "text" class = "form-control"name= "email" id= "email" placeholder="Введите Email"><br>
   <input type = "password" class ="form-control"name = "pass" id= "pass" placeholder="И Пароль"><br>
   <button class ="btn btn-success" type="submit"> Авторизоватся </button>
  </form>
 </div>
   <?php else:?>
  <p>Привет <?=$_COOKIE['user']?>.Чтобы выйти нажмите <a href = "/exit.php">здесь</a>.</p>

 <?php endif;?>
</body>
</html>
