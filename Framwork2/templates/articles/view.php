<?php include __DIR__.'\..\main\header.php' ?>
<h1><?= $article->getName() ?></h1>
<p><?= $article->getText() ?></p>
<p>Автор: <?= $article->getAuthorId()->getNickname() ?></p>

<ul>
    <li><a href="/Framwork2/www/articles/edit/<?=$article->getId() ?>">Редактировать статью</a></li>
    <li><a href="/Framwork2/www/articles/delete/<?=$article->getId() ?>">Удалить статью</a></li>
</ul>

<form action="/Framwork2/www/comments/store" method="post">
    <input type="text" name="comment">
    <input type="text" name="articleId" value='<?= $article->getId(); ?>' hidden>
    <select name="authorId" id="">
        <?php foreach ($users as $user): ?>
            <option value="<?= $user->getId(); ?>"><?= $user->getNickname(); ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Добавить комментарий</button>
</form>

<p>
    <?php foreach ($comments as $comment): ?>
    <p>
        <?= $comment->getComment(); ?>
    </p>
    <div style="display:flex; justify-content:space-between;">
        <p>
            Автор:
            <?= $comment->getAuthor()->getNickname();
             ; ?>
        </p>
        <p>
        <?= $comment->getDate();
            ; ?>
        </p>
    </div>
    <a href="/Framwork2/www/comments/<?= $comment->getId(); ?>">Посмотреть комментарий</a>



    <hr>
<?php endforeach; ?>
<p>

<?php include __DIR__.'\..\main\footer.php' ?>


