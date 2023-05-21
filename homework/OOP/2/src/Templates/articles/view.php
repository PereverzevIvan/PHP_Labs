<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p><?= $user->getNick() ?></p>
    <ul class="article-actions">
        <li><a href="/PHP_Labs/homework/OOP/2/articles/edit/<?= $article->getId() ?>">Редактировать статью</a></li>
        <li><a href="/PHP_Labs/homework/OOP/2/articles/delete/<?= $article->getId() ?>">Удалить статью</a></li>
    </ul>
<?php include __DIR__ . '/../footer.php'; ?>