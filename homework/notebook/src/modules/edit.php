<?php
    if(!isset($_GET['editId'])) $_GET['editId']=-1;
    if(!isset($_GET['forEdit'])) $_GET['forEdit']='no';

    require('./src/modules/db.php');
    $my_db = connect();
    if (mysqli_errno($my_db)) echo "Ошибка запроса ".mysqli_error($my_db);

    if ($_GET['editId'] !== -1) {
        $cols = ['firstname', 'name', 'lastname', 'address', 'phone', 'email', 'date', 'comment'];
        if ($_GET['forEdit'] == 'yes') {
            if (isset($_POST['firstname'])) {
                $cols = ['firstname', 'name', 'lastname', 'address', 'phone', 'email', 'date', 'comment'];
                $sql_request = "UPDATE `notebook` SET ";
                foreach ($cols as $index => $col) {
                    $sql_request .= "`{$col}` = '{$_POST[$col]}'";
                    if ($index < count($cols)-1) {
                        $sql_request .= ", ";
                    }
                }
                $sql_request .= " WHERE `id` = {$_GET['editId']};";
                mysqli_query($my_db, $sql_request);
            }
        }
        $sql_request = "SELECT * FROM `notebook` WHERE `id` = {$_GET['editId']}";
        $data_form = mysqli_fetch_assoc(mysqli_query($my_db, $sql_request));
    }
?>
<h1 class="title title--big">Редактирование записей таблицы контактов</h1>
<div class="grid-container">
    <ul class="contacts-list wrapper">
        <?php 
            $sql_request = "SELECT `id`, `firstname`, `name` FROM `notebook` ORDER BY `firstname`, `name`";
            $response = mysqli_query($my_db, $sql_request);
            $i = 0;
            while ($data = mysqli_fetch_assoc($response)) {
                $i++;
                echo "
                    <li class='contact'>
                        {$i} <a class='contact__link' href='./?menuVariant=edit&editId={$data['id']}'>{$data['firstname']} {$data['name']}</a>
                    </li>
                ";
            }
        ?>
    </ul>
    <form class="form" name="form_add" method="post" action="<?php echo "./?menuVariant=edit&editId={$data_form['id']}&forEdit=yes&message=edit_success"?>">
        <div class="column wrapper">
            <div class="add">
                <label>Фамилия</label> <input required type="text" name="firstname" placeholder="Фамилия" value="<?php echo $data_form['firstname']?>">
            </div>
            <div class="add">
                <label>Имя</label> <input required type="text" name="name" placeholder="Имя" value="<?php echo $data_form['name']?>">
            </div>
            <div class="add">
                <label>Отчество</label> <input required type="text" name="lastname" placeholder="Отчество" value="<?php echo $data_form['lastname']?>">
            </div>
            <div class="add">
                <label>Дата рождения</label> <input required type="date" name="date" value="<?php echo $data_form['date']?>">
            </div>
            <div class="add">
                <label>Телефон</label> <input required type="text" name="phone" placeholder="Телефон" value="<?php echo $data_form['phone']?>">
            </div>
            <div class="add">
                <label>Адрес</label> <input required type="text" name="address" placeholder="Адрес" value="<?php echo $data_form['address']?>">
            </div>
            <div class="add">
                <label>Email</label> <input required type="email" name="email" placeholder="Email" value="<?php echo $data_form['email']?>">
            </div>
            <div class="add">
                <label>Комментарий</label> <textarea required style="max-width: 100%" name="comment" placeholder="Краткий комментарий" rows="2"><?php echo $data_form['comment']?></textarea>
            </div>
            <button type="submit" name="button" class="btn">Редактировать</button>
        </div>
    </form>
</div>