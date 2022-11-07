<?php
    session_start();

    if (!$_SESSION['user'])
    {
        header('Location: /');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Профиль</title>
</head>
<body>
    <div class="page">
        <form>
            <h1><?= $_SESSION['user']['username']?>, привет!</h1>
            <button class="btn_exit" type="submit">Выход</button>
        </form>
    </div>

<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>