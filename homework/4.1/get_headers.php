<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Переверзев Иван 221-321</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="header__container container">
            <a href="index.html" class="header__logo">
                <img src="../logo.svg" alt="" class="image">
            </a>
            <h1>4.1. Домашняя работа: Feedback Form</h1>
        </div>
    </header>
    <main class="main">
        <div class="container central-container">
        <textarea cols="50" rows="15" class="get-headers-container">
            <?php print_r(get_headers('https://httpbin.org/post'))?>
        </textarea>
        </div>
    </main>
    <footer class="footer">
        <div class="footer__container container">
            <a href="index.html" class="header__logo">
                <img src="../logo.svg" alt="" class="image">
            </a>
            <h2>Переверзев Иван Дмитриевич 221-321</h2>
        </div>
    </footer>
</body>
</html>