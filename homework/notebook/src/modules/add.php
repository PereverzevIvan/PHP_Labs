<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteBook. Добавление</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include('./menu.php') ?>
    <main class="main">
        <section class="section">
            <div class="container wrapper">
                <h1 class="title title--big">Добавление записи в таблицу</h1>
                <form class="form" name="form_add" method="post" action="./base.php">
                    <div class="column wrapper">
                        <div class="add">
                            <label>Фамилия</label> <input type="text" name="firstname" placeholder="Фамилия">
                        </div>
                        <div class="add">
                            <label>Имя</label> <input type="text" name="name" placeholder="Имя">
                        </div>
                        <div class="add">
                            <label>Отчество</label> <input type="text" name="lastname" placeholder="Отчество">
                        </div>
                        <div class="add">
                            <label>Дата рождения</label> <input type="date" name="date">
                        </div>
                        <div class="add">
                            <label>Телефон</label> <input type="text" name="phone" placeholder="Телефон">
                        </div>
                        <div class="add">
                            <label>Адрес</label> <input type="text" name="address" placeholder="Адрес">
                        </div>
                        <div class="add">
                            <label>Email</label> <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="add">
                            <label>Комментарий</label> <textarea style="max-width: 100%; min-height: 50px;" name="comment" placeholder="Краткий комментарий" rows="2"></textarea>
                        </div>
                        <button type="submit" name="button" class="form-btn">Отправить</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <?php include('./footer.html') ?>
</body>

</html>