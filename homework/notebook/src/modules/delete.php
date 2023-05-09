<?php
    if(!isset($_GET['deleteId'])) $_GET['deleteId']=-1;

    require('./src/modules/db.php');
    $my_db = connect();
    if (mysqli_errno($my_db)) echo "Ошибка запроса ".mysqli_error($my_db);
    if ($_GET['deleteId'] !== -1) {
        $sql_request = "DELETE FROM `notebook` WHERE `id` = {$_GET['deleteId']}";
        mysqli_query($my_db, $sql_request);
    }
?>
<h1 class="title title--big">Удаление записей таблицы контактов</h1>
<ul class="contacts-list contacts-list--delete wrapper">
    <?php 
        $sql_request = "SELECT `id`, `firstname`, `name`, `lastname` FROM `notebook` ORDER BY `firstname`, `name`";
        $response = mysqli_query($my_db, $sql_request);
        $i = 0;
        while ($data = mysqli_fetch_assoc($response)) {
            $i++;
            echo "
                <li class='contact'>
                    {$i} <p class='contact__text'>{$data['firstname']} " . mb_substr($data['name'], 0, 1) . ". " . mb_substr($data['lastname'], 0, 1) . ". " . "</p> <a class='btn btn--red contact__btn' href='./?menuVariant=delete&deleteId={$data['id']}&message=delete_success'>Удалить</a>
                </li>
            ";
        }
    ?>
</ul>