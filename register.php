<?php
    session_start();

    if ($_SESSION['user'])
    {
        header('Location: profile.php');
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Регистрация</title>
</head>
<body>
    <div class="page">
        <h1>Регистрация</h1>
        <form class="form">
        <input type="text" name="login" id="login" placeholder="Логин"><br>
        <input type="password" name="pass" id="pass" placeholder="Пароль"><br>
        <input type="password" name="password_confirm" id="password_confirm" placeholder="Подтвердите пароль"><br>
        <input type="email" name="email" id="email" placeholder="Почта"><br>
        <input type="text" name="username" id="username" placeholder="Имя"><br>
        <button class="btn_reg" type="submit">Регистрация</button>
        <p>
             У вас есть аккаунт? - <a href="index.php">Авторизуйтесь!</a>
        </p>
        <p class="msg none"></p>
        </form> 
    </div>    

<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
</body>
</html>