<?php session_start(); ?>
<!DOCTYPE html>
<html lang ="ru">
<head>
  <meta charset  = "UTF-8">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content = "ie=edge">
  <title>Форма Регистрации</title>
  <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href ="css/style.css">
  <script src="//ulogin.ru/js/ulogin.js"></script>
</head>
<body>
  <div class = "container mt-1" >
  <br>
  <?php if (!isset($_SESSION['user'])): ?>
    <div class = "row">
      <div class = "col">
        <font size="+3" style= "color: green">Войти через социальную сеть</font>
        <div data-ulogin="display=panel;fields=first_name,email;providers=vkontakte,odnoklassniki,mailru,
          facebook;hidden=twitter,google,yandex,livejournal,openid,lastfm,linkedin,liveid,soundcloud,steam,
          flickr,uid,youtube,webmoney,foursquare,tumblr,googleplus,vimeo,instagram,wargaming;redirect_uri=validation-form%2Fsocial.php">
        </div>
        <br>

        <font face="Helvetica">
        <font size="+3" style= "color: green">Регистрация</font>
        <div STYLE="font-size:15px; font-weight: bold">
          <form action="validation-form/check.php" method = "post"><br>
            <input type = "text" class = "form-control"name= "login" id= "login" placeholder="Введите Логин"><br>
            <input type = "text" class = "form-control"name= "email" id= "email" placeholder="Введите ваш Email"><br>
            <input type = "password" class = "form-control"name = "pass" id= "pass" placeholder="Введите Пароль" ><br>
            <input type = "password" class ="form-control"name = "pass2" id= "pass2" placeholder="Введите еще раз Пароль"><br>
            <button class ="btn btn-success" type="submit">Зарегистрироваться</button>
          </form>
          <br>
        </div>

        <font size="+3" style= "color: green">Авторизация</font>
        <form action="validation-form/auth.php" method = "post"><br>
          <input type = "text" class = "form-control"name= "email" id= "email" placeholder="Введите Email"><br>
          <input type = "password" class ="form-control"name = "pass" id= "pass" placeholder="И Пароль"><br>
          <button class ="btn btn-success" type="submit"> Авторизоватся </button>
        </form>
        </div>
  <?php else:?>
    <p>Привет <?=$_SESSION['user']?>.Чтобы выйти нажмите <a href = "validation-form/exit.php">здесь</a>.</p>
  <?php endif;?>
</body>
</html>
