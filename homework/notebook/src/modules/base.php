<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteBook. Просмотр</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include('./menu.php') ?>
    <main class="main">
        <section class="section">
            <div class="container wrapper">
                <h1 class="title title--big">Просмотр таблицы контактов</h1>
                <?php
                    require('./db.php');
                    $my_db = connect();
                    
                    if (isset($_POST['firstname'])) {
                        $sql_request = "INSERT INTO `notebook` (`firstname`, `name`, `lastname`, `address`, `phone`, `email`, `date`, `comment`) 
                        VALUES ('".$_POST['firstname']."','".$_POST['name']."','".$_POST['lastname']."','".$_POST['address']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['date']."','".$_POST['comment']."')";
                        $response = mysqli_query($my_db, $sql_request);
                    }

                    $sql_request = "SELECT * FROM `notebook`";
                    $response = mysqli_query($my_db, $sql_request);
                    if (mysqli_errno($my_db)) echo "Ошибка запроса ".mysqli_error($my_db);
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
                    echo $table;
                ?>
            </div>
        </section>
    </main>
    <?php include('./footer.html') ?>
</body>
</html>