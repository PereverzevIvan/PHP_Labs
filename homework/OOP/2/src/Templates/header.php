<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой блог</title>
    <link rel="stylesheet" href="/PHP_Labs/homework/OOP/2/src/Styles/style.css">
</head>
<body>
    <table class="layout">
        <tr>
            <td colspan="2" class="header">
                Мой блог
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right">
                <?= !empty($user) ? 'Привет, ' . $user->getNick() . '<a href="/PHP_Labs/homework/OOP/2/users/logout">| Выйти</a>' : '<a href="/PHP_Labs/homework/OOP/2/users/login">Войдите на сайт</a>' ?>
            </td>
        </tr>
        <tr>
            <td>