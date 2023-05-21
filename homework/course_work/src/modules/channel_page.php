<?php
    if (!isset($_GET['channel_id'])) {
        $_GET['channel_id'] = 1;
    }
    if (!isset($_GET['channel_pag_page'])) {
        $_GET['channel_pag_page'] = 0;
    }
    require('./src/modules/db.php');
    $my_db = connect();
    if (mysqli_errno($my_db)) echo "Ошибка запроса ".mysqli_error($my_db);

    if ($_GET['add_post']  === 'yes') {
        $pattern = "/\#(\w+)/ui";
        if ($_POST['post_description'] && $_SESSION['userInfo']['access']) {
            preg_match_all($pattern, $_POST['post_content'], $hashtag);
            $hashtag = $hashtag[1][0];
            $sql_request = "SELECT * FROM `Hashtags` WHERE `name` = '{$hashtag}'";
            if (!mysqli_fetch_assoc(mysqli_query($my_db, $sql_request))) {
                mysqli_query($my_db, "INSERT INTO `Hashtags` (`name`) VALUES ('{$hashtag}')");
            }
            $hashtag_data = mysqli_fetch_assoc(mysqli_query($my_db, $sql_request));

            if ($_POST['post_is_private']) {
                $is_private = 1;
            }
            else {
                $is_private = 0;
            }
            $sql_request = "INSERT INTO `Posts` 
            (`hashtag_id`, `user_id`, `channel_id`, `description`, `content`, `is_private`) 
            VALUES ('{$hashtag_data['id']}', '{$_SESSION['userInfo']['user_id']}', 
            '{$_GET['channel_id']}', '{$_POST['post_description']}', '{$_POST['post_content']}', 
            '{$is_private}')";
            mysqli_query($my_db, $sql_request);
            mysqli_query($my_db, "UPDATE `Channels` SET `posts_count`=`posts_count`+1 WHERE `id`={$_GET['channel_id']}");
        }
    }
    $sql_request = "SELECT `Posts`.*, `Users`.`id`, `Users`.`name`, `Hashtags`.`name` FROM `Posts` JOIN `Users` ON `Posts`.`user_id` = `Users`.`id` JOIN `Hashtags` ON `Posts`.`hashtag_id` = `Hashtags`.`id` WHERE `Posts`.`channel_id` = '{$_GET['channel_id']}'";
    $response = mysqli_query($my_db, $sql_request);
?>

<div class="container wrapper">
    <h1 class="title title--big">Канал "<?php echo "{$_GET['channelName']}"?>"</h1>
    <?php
        if ($_SESSION['userInfo']['access']) {
            echo "<button class='btn' id='add-post'>Написать пост</button>";
        }
    ?>
    <form action="<?php echo "./?pageType=channel_page&channel_id={$_GET['channel_id']}&channelName={$_GET['channelName']}&channel_pag_page=0&add_post=yes"?>" class="form post-form post-form--hidden" method="post">
        <fieldset>
            <label for="post_description">Введите заголовок поста</label>
            <input required type="text" name="post_description" placeholder="Введите заголовок поста" id="post_description">
            <label for="post_description">Введите содержание поста</label>
            <textarea required type="text" name="post_content" placeholder="Введите содержание поста" id="post_description"></textarea>
            <label><input type="checkbox" name="post_is_private" id='post_is_private'> Приватный пост</label>
            <div class="button-box">
                <button type="submit" class="btn btn--green">Отправить</button>
                <button type="reset" class="btn btn--red">Стереть</button>
            </div>
        </fieldset>
    </form>
    <ul class="posts-list wrapper">
        <?php
            foreach (mysqli_fetch_all($response) as $data) {
                if ($data[6] && 
                ($_SESSION['userInfo']['access'] === false || 
                ($_SESSION['userInfo']['access'] === true && 
                $_SESSION['userInfo']['user_id'] != $data[7] && 
                $_SESSION['userInfo']['user_id'] != 1))) {
                    continue;
                }
                else {
                    $list_item = '<li class="post">';
                    $list_item .= "<p class='post__header'>{$data[4]}</p>";
                    $list_item .= "<p class='post__content'>{$data[5]}</p>";
                    $list_item .= "<p class='post__hashtag'>#{$data[9]}</p>";
                    $list_item .= "<p class='post__owner'>Автор: <a href='#'>{$data[8]}</a></p>";
                    $list_item .= "</li>";
                    echo $list_item;
                }
            }
        ?>
        </li>
    </ul>
</div>