<?php
    $sort_keys = ['time' => 'id', 'channel_name' => 'name', 'posts_count' => 'posts_count'];
    require('./src/modules/db.php');
    $my_db = connect();
    if (mysqli_errno($my_db)) echo "Ошибка запроса ".mysqli_error($my_db);

    if (!isset($_GET['dbSort'])) {
        $_GET['dbSort'] = 'time';
    }
    if (!isset($_GET['searchChannel'])) {
        $_GET['searchChannel'] = 'no';
    }
    if ($_GET['searchChannel'] === 'no') {
        $sql_request = "SELECT * FROM `Channels` ORDER BY `{$sort_keys[$_GET['dbSort']]}`";
    }
    else {
        $sql_request = "SELECT * FROM `Channels` WHERE `name` = '{$_POST['input_channel_name']}'";
    }
    $response = mysqli_query($my_db, $sql_request);
?>

<div class="container wrapper">
    <h1 class="title title--big">Список каналов</h1>
    <form class='form channel-form' action=<?php echo "'./?pageType=channels&dbSort={$_GET['dbSort']}&searchChannel=yes'"?> method="post">
        <fieldset>
            <input required type="text" name="input_channel_name" placeholder="Введите название канала">
            <button type='submit' class="btn">Найти</button>
        </fieldset>
    </form>
    <ul class="list channel-list">
        <li class="list__item list__item--no-select">
            <p class='list__text list__header'>№</p>
            <p class='list__text list__header'>Канал</p>
            <p class='list__text list__header'>Описание</p>
            <p class='list__text list__header'>Кол-во постов</p>
            <p class='list__text list__header'>Надежный</p>
        </li>
        <?php
        $i = 0;
            while ($data = mysqli_fetch_assoc($response)) {
                $i++;
                $list_item = '<li class="list__item">';
                $list_item .= "<p class='list__text list__header'>{$i}</p>";
                $list_item .= "<a href='./?pageType=channel_page&channel_id={$data['id']}&channelName={$data['name']}&channel_pag_page=0' class='list__text'>{$data['name']}</a>";
                $list_item .= "<p class='list__text'>{$data['description']}</p>";
                $list_item .= "<p class='list__text'>{$data['posts_count']}</p>";
                if ($data['is_trusted']) {
                    $list_item .= "<p class='trust-text'>✔</p>";
                }
                $list_item .= '</li>';
                echo $list_item;
            }
        ?>
    </ul>
</div>
