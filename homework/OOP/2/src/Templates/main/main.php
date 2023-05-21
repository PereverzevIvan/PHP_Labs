<?php include __DIR__ . '/../header.php'; ?>

<?php foreach ($articles as $article): ?>
    <h2>
        <a href="/PHP_Labs/homework/OOP/2/articles/check/<?= $article->getId() ?>"><?= $article->getName() ?></a>
    </h2>
    <p>
        <?= $article->getText() ?>
    </p>
    <hr>
<?php endforeach; ?>

<?php include __DIR__ . '/../footer.php'; ?>