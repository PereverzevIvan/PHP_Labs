<div class="container wrapper">
    <?php
        if ($_SESSION['userInfo']['access'] === false) {
            echo "<h1 class='title title--big'>Вы не авторизованы</h1>";
        }
        else {
            echo "<h1 class='title title--big'>Добро пожаловать, {$_SESSION['userInfo']['user_name']}</h1>";
            echo '<a href="./?pageType=channels&logout=yes" class="btn btn--red">Выйти из аккаунта</a>';      
            if ($_SESSION['userInfo']['user_id'] == 1) {
                echo '
                    <div class="button-box">
                        <a href="#" class="btn btn--green">Добавить канал</a>
                        <a href="#" class="btn btn--green">Добавить область знаний</a>
                    </div>
                ';
            }
        }
    ?>
</div>