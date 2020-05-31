<!DOCTYPE html>
<html lang ="ru">
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
   <font size="+3" style= "color: green">Форма Регистрации</font>
    <DIV STYLE="font-size:15px; font-weight: bold">
    <form action="validation-form/check.php" method = "post"><br>
     <input type = "text" class = "form-control"name= "login" id= "login" placeholder="Введите Логин"><br>
     <input type = "text" class = "form-control"name= "email" id= "email" placeholder="Введите ваш Email"><br>
     <input type = "password" class = "form-control"name = "pass" id= "pass" placeholder="Введите Пароль" ><br>
     <input type = "password2" class ="form-control"name = "pass2" id= "pass2" placeholder="Введите еще раз Пароль"><br>
     <button class ="btn btn-success" type="submit"> Зарегестрировать</button>
   </form><br>
</div>
<div class = "col">
  <font size="+3" style= "color: green">Форма Авторизации</font>
    <form action="validation-form/auth.php" method = "post"><br>
   <input type = "text" class = "form-control"name= "email" id= "email" placeholder="Введите Email"><br>
   <input type = "password" class ="form-control"name = "pass" id= "pass" placeholder="И Пароль"><br>
   <button class ="btn btn-success" type="submit"> Авторизоваться </button>
  </form>
 </div>
   <?php else:?>
  <p>Привет <?=$_COOKIE['user']?>.Чтобы выйти нажмите <a href = "/exit.php">здесь</a>.</p>

 <?php endif;?>
</body>
</html>