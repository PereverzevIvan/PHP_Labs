<?php include __DIR__ . '/../header.php'; ?>
    <h2>Редактирование статьи</h2>
    <p>Article`s Author: <?= $article_user->getNick() ?></p>
    <form class="edit-form" action="/PHP_Labs/homework/OOP/2/articles/update/<?= $article->getId() ?>" method="post">
        <label>Title<br><input required type="text" name='title' value="<?= $article->getName() ?>"></label>
        
        <label>Text<br><textarea required name="text" cols="30" rows="10"><?= $article->getText() ?></textarea></label>
        <button type="submit">Save</button>
    </form>
<?php include __DIR__ . '/../footer.php'; ?>