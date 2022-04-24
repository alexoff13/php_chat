<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="align-items-center justify-content-center row">
        <div class="align-self-center col-6 col-sm-5 col-md-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <form id="authForm" class="auth__form" action="auth.php">
                        <div class="mb-3">
                            <label for="login" class="form-label">Логин</label>
                            <input name="login" class="form-control" id="login">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input name="password" type="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <button type="submit" class="btn btn-primary">Войти</button>
                            <a href="chat.php?auth=false" class="d-flex align-items-center"
                               style="text-decoration: none; align-items: center;">
                                <div style="padding-left: 3px">Перейти к сообщениям</div>
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php
if (isset($_GET['auth']) and $_GET['auth'] === 'false') {
    echo '<script type="text/javascript">';
    echo 'alert("Неверный логин или пароль")';
    echo '</script>';
}
?>