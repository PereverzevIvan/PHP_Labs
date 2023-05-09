<header class="header">
    <div class="container wrapper wrapper--h">
        <img src="./src/img/logo.svg" width="190" alt="Логотип Московского Политеха" class="header__logo">
        <nav class="header__nav wrapper wrapper--h">
            <a href="./?menuVariant=view" class="header__main-link" id="view">Просмотр</a>
            <a href="./?menuVariant=add" class="header__main-link" id="add">Добавление</a>
            <a href="./?menuVariant=edit" class="header__main-link" id="edit">Редактирование</a>
            <a href="./?menuVariant=delete" class="header__main-link" id="delete">Удаление</a>
        </nav>
    </div>
    <nav class="header__sub-nav wrapper wrapper--h">
        <a href="./?menuVariant=view&dbSort=time" class="header__sub-link" id="time">Время создания</a>
        <a href="./?menuVariant=view&dbSort=firstName" class="header__sub-link" id="firstName">Фамилия</a>
        <a href="./?menuVariant=view&dbSort=date" class="header__sub-link" id="date">Дата рождения</a>
    </nav>
</header>