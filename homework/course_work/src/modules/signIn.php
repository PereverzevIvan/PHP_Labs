<div class="container wrapper">
    <?php
        if ($_SESSION['userInfo']['access'] === false) {
            echo '
            <h1 class="title title--big">Авторизация</h1>
            <form class="form sign-form" action="#" method="post">
                <fieldset>
                    <label for="user_email">Введите email</label>
                    <input required type="email" name="user_email" placeholder="Введите email" id="user_email">
                    <label for="user_password">Введите пароль</label>
                    <input required type="password" name="user_password" placeholder="Введите пароль" id="user_password">
                    <div class="button-box">
                        <button type="submit" class="btn btn--green">Войти</button>
                        <button type="reset" class="btn btn--red">Стереть</button>
                    </div>
                </fieldset>
            </form>';
        }
        else {
            echo "<h1 class='title title--big'>Добро пожаловать, {$_SESSION['userInfo']['user_name']}</h1>";
        }
    ?>
</div>