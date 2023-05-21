<?php
    function connect() {
        $my_db = mysqli_connect('localhost', 'root', '', 'hashtag_sorter');
        if (mysqli_connect_errno()) echo "Ошибка подключения ". mysqli_connect_error();
        return $my_db;
    }
?>