<?php include __DIR__ . '/../header.php'; ?>
<?php if ($articles) {echo '<h2>Статьи</h2>';}?>
<?php foreach ($articles as $article): ?>
    <hr>
    <h3>
        <a href="/PHP_Labs/homework/OOP/2/articles/check/<?= $article->getId() ?>"><?= $article->getName() ?></a>
    </h3>
    <p>
        <?= $article->getText() ?>
    </p>
<?php endforeach; ?>

<?php include __DIR__ . '/../footer.php'; ?>