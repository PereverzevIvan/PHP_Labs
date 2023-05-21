<?php
    require('./src/modules/db.php');
    $my_db = connect();
    if (mysqli_errno($my_db)) echo "Ошибка запроса ".mysqli_error($my_db);

    if (!isset($_GET['searchField'])) {
        $_GET['searchField'] = -1;
    }
    $sql_request = "SELECT * FROM `Hashtags` ORDER BY `name`";
    $response = mysqli_query($my_db, $sql_request);
?>

<div class="container wrapper">
    <h1 class="title title--big">Список областей знаний</h1>
    <ul class="list tags-list">
        <li class="list__item list__item--no-select">
            <p class='list__text list__header'>№</p>
            <p class='list__text list__header'>Хэштег</p>
        </li>
        <?php
        $i = 0;
            while ($data = mysqli_fetch_assoc($response)) {
                $i++;
                $list_item = '<li class="list__item">';
                $list_item .= "<p class='list__text list__header'>{$i}</p>";
                $list_item .= "<a href='./?pageType=fields&searchField={$data['id']}' class='list__text'>{$data['name']}</a>";
                $list_item .= '</li>';
                echo $list_item;
            }
        ?>
    </ul>
</div>