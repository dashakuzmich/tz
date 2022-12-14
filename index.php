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
    <title>Авторизация</title>
</head>
<body>
    <div class="page">
        <h1>Добро пожаловать!</h1>
        <form>
            <input type="text" name="login" id="login" placeholder="Логин"><br>
            <input type="password" name="pass" id="pass" placeholder="Пароль"><br>
            <button class="btn_auth" type="submit">Войти</button>
            <p>
                У вас нет аккаунта? - <a href="register.php">Зарегистрируйтесь!</a>
            </p>
            <p class="msg none"></p>
        </form> 
    </div>    

<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>