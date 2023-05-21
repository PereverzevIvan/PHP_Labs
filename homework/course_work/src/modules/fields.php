<?php
    require('./src/modules/db.php');
    $my_db = connect();
    if (mysqli_errno($my_db)) echo "Ошибка запроса ".mysqli_error($my_db);

    if (!isset($_GET['searchField'])) {
        $_GET['searchField'] = -1;
    }
    $sql_request = "SELECT * FROM `Fields` ORDER BY `name`";
    $response = mysqli_query($my_db, $sql_request);
?>

<div class="container wrapper">
    <h1 class="title title--big">Список областей знаний</h1>
    <div class="grid-container">
        <ul class="list fields-list">
            <li class="list__item list__item--no-select">
                <p class='list__text list__header'>№</p>
                <p class='list__text list__header'>Область знаний</p>
                <p class='list__text list__header'>Описание</p>
            </li>
            <?php
            $i = 0;
                while ($data = mysqli_fetch_assoc($response)) {
                    $i++;
                    $list_item = '<li class="list__item">';
                    $list_item .= "<p class='list__text list__header'>{$i}</p>";
                    $list_item .= "<a href='./?pageType=fields&searchField={$data['id']}' class='list__text'>{$data['name']}</a>";
                    $list_item .= "<p class='list__text'>{$data['description']}</p>";
                    $list_item .= "<p class='list__text'>{$data['posts_count']}</p>";
                    $list_item .= '</li>';
                    echo $list_item;
                }
            ?>
        </ul>
        <?php
            if ($_GET['searchField'] >= 1) {
                $sql_request = "SELECT * FROM `Fields_hashtags` JOIN `Hashtags` ON `Fields_hashtags`.`hashtag_id` = `Hashtags`.`id` WHERE `Fields_hashtags`.`field_id` = '{$_GET['searchField']}'";
                $response = mysqli_query($my_db, $sql_request);
            }
        ?>
        <ul class="list fields-list fields-list--2">
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
                    $list_item .= "<a href='#' class='list__text'>{$data['name']}</a>";
                    $list_item .= "<p class='list__text'>{$data['description']}</p>";
                    $list_item .= "<p class='list__text'>{$data['posts_count']}</p>";
                    $list_item .= '</li>';
                    echo $list_item;
                }
            ?>
        </ul>
    </div>
</div>