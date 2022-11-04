<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
    <div class="authPage">
        <div class="authPage__content">
            <h1>Авторизация</h1>
            <form class="authForm">
                <label>Логин</label>
                <input type="text" name="login" id="login" placeholder="Введите логин"><br>
                <label>Пароль</label>
                <input type="password" name="pass" id="pass" placeholder="Введите пароль"><br>
                <button class="btn_auth" type="submit">Войти</button>
                <p>
                     У вас нет аккаунта? - <a href="register.php">Зарегистрируйтесь!</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>