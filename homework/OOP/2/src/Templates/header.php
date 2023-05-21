<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>
            <?php
            if (isset($title)) {
                echo $title;
            } else {
                echo 'Мой блог';
            }
            ?>
        </title>
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
                <td>