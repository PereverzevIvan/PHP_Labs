<h1 class="title title--big">Просмотр таблицы контактов</h1>
<?php
    $sort_keys = ['time' => 'id', 'firstName' => 'firstname', 'date' => 'date'];
    require('./src/modules/db.php');
    $my_db = connect();
    if (mysqli_errno($my_db)) echo "Ошибка запроса ".mysqli_error($my_db);

    $page = $_GET['page'];
    $row_count = mysqli_fetch_row(mysqli_query($my_db, 'SELECT COUNT(*) FROM notebook'));
    $page_count = ceil($row_count[0] / 10) - 1;
    if ($page - 1 < 0) $prev_page = 0; else $prev_page = $page - 1;
    if ($page + 1 > $page_count) $next_page = $page_count; else $next_page = $page + 1;

    $current_rows = $page*10;
    $sql_request = "SELECT * FROM `notebook` ORDER BY `{$sort_keys[$_GET['dbSort']]}` LIMIT {$current_rows}, 10";
    $response = mysqli_query($my_db, $sql_request);

    $table = '<table class="table">
        <thead>
            <tr class="table__row">
                <th class="table__col">id</th>
                <th class="table__col">Firstname</th>
                <th class="table__col">Name</th>
                <th class="table__col">Lastname</th>
                <th class="table__col">Address</th>
                <th class="table__col">Phone</th>
                <th class="table__col">Email</th>
                <th class="table__col">Date</th>
                <th class="table__col">Comment</th>
            </tr>
        </thead>
        <tbody>';

    while ($data = mysqli_fetch_assoc($response)) {
        $table .= '
                <tr class="table__row">
                    <th class="table__col">'.$data['id'].'</th>
                    <td class="table__col">'.$data['firstname'].'</td>
                    <td class="table__col">'.$data['name'].'</td>
                    <td class="table__col">'.$data['lastname'].'</td>
                    <td class="table__col">'.$data['address'].'</td>
                    <td class="table__col">'.$data['phone'].'</td>
                    <td class="table__col">'.$data['email'].'</td>
                    <td class="table__col">'.$data['date'].'</td>
                    <td class="table__col">'.$data['comment'].'</td>
                </tr>';
    }
    $table .= '</tbody></table>';

    if ($page_count > 1) {
        echo "
            <div class='pagination-block'>
                <a href='./?dbSort={$_GET['dbSort']}&page={$prev_page}' class='btn'S>Назад</a> " .
                $page+1 . " страница из " . $page_count+1 .
                " <a href='./?dbSort={$_GET['dbSort']}&page={$next_page}' class='btn'>Вперед</a>
            </div>
    ";
    }
        
    echo $table;
?>
