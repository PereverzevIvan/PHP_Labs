<?php 
    require('./src/modules/db.php');
    $my_db = connect();
    if (mysqli_errno($my_db)) echo "Ошибка запроса ".mysqli_error($my_db);
    
    if (isset($_POST['firstname'])) {
        $cols = ['firstname', 'name', 'lastname', 'address', 'phone', 'email', 'date', 'comment'];
        $sql_request = "INSERT INTO `notebook` (";
        foreach ($cols as $index => $col) {
            $sql_request .= "`{$col}`";
            if ($index < count($cols)-1) {
                $sql_request .= ", ";
            } 
        }
        $sql_request .= ") VALUES (";
        foreach ($cols as $index => $col) {
            $sql_request .= "'" . htmlspecialchars($_POST[$col]) . "'";
            if ($index < count($cols)-1) {
                $sql_request .= ", ";
            }
        };
        $sql_request .= ")";
        $response = mysqli_query($my_db, $sql_request);
    }
?>
<h1 class="title title--big">Добавление записи в таблицу</h1>
<form class="form" name="form_add" method="post" action="./?menuVariant=add&message=add_success">
    <div class="column wrapper">
        <div class="add">
            <label>Фамилия</label> <input required type="text" name="firstname" placeholder="Фамилия">
        </div>
        <div class="add">
            <label>Имя</label> <input required type="text" name="name" placeholder="Имя">
        </div>
        <div class="add">
            <label>Отчество</label> <input required type="text" name="lastname" placeholder="Отчество">
        </div>
        <div class="add">
            <label>Дата рождения</label> <input required type="date" name="date">
        </div>
        <div class="add">
            <label>Телефон</label> <input required type="text" name="phone" placeholder="Телефон">
        </div>
        <div class="add">
            <label>Адрес</label> <input required type="text" name="address" placeholder="Адрес">
        </div>
        <div class="add">
            <label>Email</label> <input required type="email" name="email" placeholder="Email">
        </div>
        <div class="add">
            <label>Комментарий</label> <textarea required style="max-width: 100%; min-height: 50px;" name="comment" placeholder="Краткий комментарий" rows="2"></textarea>
        </div>
        <button type="submit" name="button" class="btn">Отправить</button>
    </div>
</form>