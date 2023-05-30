<?php include __DIR__ . '/../header.php'; ?>
    <h2>Редактирование комментария</h2>
    <p>Comment`s Author: <?= $comment->getAuthor()->getNick() ?></p>
    <form class="edit-form" action="/PHP_Labs/homework/OOP/2/articles/comments/edit/<?= $comment->getId() ?>" method="post">
        <label>Text<br><textarea required name="text" cols="30" rows="10"><?= $comment->getText() ?></textarea></label>
        <button type="submit">Save</button>
    </form>
<?php include __DIR__ . '/../footer.php'; ?>