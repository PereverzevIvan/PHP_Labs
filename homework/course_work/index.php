<?php
    session_start();
    if (!isset($_SESSION['userInfo'])) {
        $_SESSION['userInfo'] = ['access' => false, 'user_id' => 0, 'user_name' => 'NoName'];
    }
    if ($_SESSION['userInfo']['access'] === false && $_GET['pageType'] === 'signIn') {
        if ($_POST['user_email']) {
            require('./src/modules/db.php');
            $my_db = connect();
            if (mysqli_errno($my_db)) echo "Ошибка запроса ".mysqli_error($my_db);
            
            $sql_request = "SELECT * FROM `Users` WHERE `email` = '{$_POST['user_email']}'";
            if ($data = mysqli_fetch_assoc(mysqli_query($my_db, $sql_request))) {
                if ($_POST['user_password'] === $data['password']) {
                    $_SESSION['userInfo'] = ['access' => True, 'user_id' => $data['id'], 'user_name' => $data['name']];
                }
                else {
                    echo 'Неверный пароль';
                }
            }
            else {
                echo 'Неверный email';
            }
        }
    }

    if ($_SESSION['userInfo']['access'] === false && $_GET['pageType'] === 'signUp') {
        if ($_POST['user_name']) {
            require('./src/modules/db.php');
            $my_db = connect();
            if (mysqli_errno($my_db)) echo "Ошибка запроса ".mysqli_error($my_db);
            
            $sql_request = "SELECT * FROM `Users` WHERE `email` = '{$_POST['user_email']}'";
            if (!mysqli_fetch_all(mysqli_query($my_db, $sql_request))) {
                $sql_request_insert = "INSERT INTO `Users` (`name`, `email`, `password`) VALUES ('{$_POST['user_name']}', '{$_POST['user_email']}', '{$_POST['user_password']}')";
                mysqli_query($my_db, $sql_request_insert);
                $data = mysqli_fetch_assoc(mysqli_query($my_db, $sql_request));
                $_SESSION['userInfo'] = ['access' => True, 'user_id' => $data['id'], 'user_name' => $data['name']];
                echo 'Регистрация успешна';
            }
            else {
                echo 'Такой пользователь уже есть';
            }
        }
    }

    if ($_GET['logout'] === 'yes') {
        $_SESSION['userInfo'] = ['access' => false, 'user_id' => 0, 'user_name' => 'NoName'];
    }
    if (!isset($_GET['pageType'])) {
        $_GET['pageType'] = 'channels';
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteBook. Просмотр</title>
    <link rel="stylesheet" href="./src/css/style.css">
</head>
<body>
    <?php require './src/modules/menu.php';?>
    <main class="main">
        <section class="section">
            <?php
                if (file_exists("./src/modules/{$_GET['pageType']}.php")) {
                    include "./src/modules/{$_GET['pageType']}.php";
                }
            ?>
        </section>
    </main>
    <?php require './src/modules/footer.html'?>
</body>
<script src="./src/js/main.js"></script>
<script>
    <?php
        echo "changeMainNavLink('" . $_GET['pageType'] . "');";
        echo "changeSubNavLink('" . $_GET['dbSort'] . "');";
    ?>
</script>
</html>