<?php
setcookie ('user',$user['name'], time()- 3600,"/" );
header('Location: http://localhost/www.webdevtest.com/');
?>