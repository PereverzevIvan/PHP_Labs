<?php ?>
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
            <div class="container wrapper">
                <?php
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