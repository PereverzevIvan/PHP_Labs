<header class="header">
    <div class="container wrapper wrapper--h">
        <img src="./src/img/logo.svg" width="190" alt="Логотип Московского Политеха" class="header__logo">
        <nav class="header__nav wrapper wrapper--h">
            <a href="./?pageType=channels" class="header__main-link" id="channels">Каналы</a>
            <a href="./?pageType=fields" class="header__main-link" id="fields">Области знаний</a>
            <a href="./?pageType=tags" class="header__main-link" id="tags">Хэштеги</a>
            <?php
                if ($_SESSION['userInfo']['access'] == true) {
                    echo "<a href='./?pageType=profile' class='header__main-link' id='profile'>Профиль</a>";
                }
                else {
                    echo "<a href='./?pageType=signUp' class='header__main-link' id='signUp'>Регистрация</a>";
                    echo "<a href='./?pageType=signIn' class='header__main-link' id='signIn'>Войти</a>";
                }
            ?>
        </nav>
    </div>
    <nav class="header__sub-nav wrapper wrapper--h">
        <a href="./?pageType=channels&dbSort=time" class="header__sub-link" id="time">Время создания</a>
        <a href="./?pageType=channels&dbSort=channel_name" class="header__sub-link" id="channel_name">Название</a>
        <a href="./?pageType=channels&dbSort=posts_count" class="header__sub-link" id="posts_count">Количество записей</a>
    </nav>
</header>