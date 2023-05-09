<?php
    if(!isset($_GET['menuVariant'])) $_GET['menuVariant']='view';
    if (!in_array($_GET['menuVariant'], ['view', 'add', 'edit', 'delete'], true)) {
        exit('Недопустимое значение параметра menuVariant');
    }
    if(!isset($_GET['dbSort']) || !in_array($_GET['dbSort'], ['time', 'firstName', 'date'])) $_GET['dbSort']='time';
    if(!isset($_GET['page'])) $_GET['page']=0;
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
    <?php
        require './src/modules/menu.php';
    ?>
    <main class="main">
        <section class="section">
            <div class="container wrapper">
                <?php
                    if (isset($_GET['message'])) {
                        if ($_GET['message'] == 'add_success') {
                            echo '<div class="alert alert--good">Запись успешно добавлена! <button class="btn btn--red alert-btn">X</button></div>';
                        }
                        else if ($_GET['message'] == 'edit_success') {
                            echo '<div class="alert alert--good">Запись успешно изменена! <button class="btn btn--red alert-btn">X</button></div>';
                        }
                        else if ($_GET['message'] == 'delete_success') {
                            echo '<div class="alert alert--good">Запись успешно удалена! <button class="btn btn--red alert-btn">X</button></div>';
                        }
                    }
                    
                    if (file_exists("./src/modules/{$_GET['menuVariant']}.php")) {
                        include "./src/modules/{$_GET['menuVariant']}.php";
                    }
                ?>
            </div>
        </section>
    </main>
    <?php require './src/modules/footer.html'?>
</body>
<script src="./src/js/main.js"></script>
<script>
    <?php
        echo "changeMainNavLink('" . $_GET['menuVariant'] . "');";
        echo "changeSubNavLink('" . $_GET['dbSort'] . "');";
    ?>
</script>
</html>