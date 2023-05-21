<?php include __DIR__ . '/../header.php'; ?>
    <p>Article`s Author: <?= $user->getNick() ?></p>
    <form class="edit-form" action="/PHP_Labs/homework/OOP/2/articles/update/<?= $article->getId() ?>" method="post">
        <label>Title<br><input type="text" name='title' value="<?= $article->getName() ?>"></label>
        
        <label>Text<br><textarea name="text" cols="30" rows="10"><?= $article->getText() ?></textarea></label>
        <button type="submit">Save</button>
    </form>
<?php include __DIR__ . '/../footer.php'; ?>