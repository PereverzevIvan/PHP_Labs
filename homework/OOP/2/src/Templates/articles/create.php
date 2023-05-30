<?php include __DIR__ . '/../header.php'; ?>
    <h2>Создание статьи</h2>
    <p>Article`s Author: <?= $user->getNick() ?></p>
    <form class="edit-form" action="/PHP_Labs/homework/OOP/2/articles/create" method="post">
        <label>Title<br><input required type="text" name='title'></label>
        <label>Text<br><textarea required name="text" cols="30" rows="10"></textarea></label>
        <button type="submit">Save</button>
    </form>
<?php include __DIR__ . '/../footer.php'; ?>