<?php include __DIR__.'\..\main\header.php' ?>
<h2>
    <?= $comment->getComment(); ?>
</h2>
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
<ul>
    
    <li><a href="/Framwork2/www/comments/edit/<?= $comment->getId(); ?>">Редактировать комментарий</a></li>
    <li><a href="/Framwork2/www/comments/delete/<?= $comment->getId(); ?>">Удалить комментарий</a></li>

</ul>

<?php include __DIR__.'\..\main\footer.php' ?>


