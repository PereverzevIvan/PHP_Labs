<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNick() ?> (<?= $article->getAuthor()->getId() ?>)</p>
    <ul class="article-actions">
    <?= (!empty($user) && ($article->getAuthor()->getId() === $user->getId() || $user->getRole() === 'admin')) ? '
        <li><a href="/PHP_Labs/homework/OOP/2/articles/edit/'. $article->getId() . '">Редактировать статью</a></li>
        <li><a href="/PHP_Labs/homework/OOP/2/articles/delete/'. $article->getId() . '">Удалить статью</a></li>
    ' : '' ?>
        <?= !empty($user) ? '<li><button class="add-comment-btn">Добавить комментарий</button></li>' : '' ?>
    </ul>
    <div class="add-comment-container" style="display: none">
        <hr>
        <form action="/PHP_Labs/homework/OOP/2/articles/comments/create" method="post">
            <label><textarea name="text" cols="30" rows="4" placeholder="Write your comment"></textarea></label>
            <input type="text" name='articleId' value='<?= $article->getId()?>' style='display:none'>
            <input type="submit" value="Добавить">
        </form>
    </div>
    <?php if ($comments) {echo '<hr> <h3>Комментарии</h3>';}?>
    <?php foreach ($comments as $comment): ?>
        <hr>
        <div class="comment" id='comment-<?= $comment->getId()?>'>
            <h4><?= $comment->getAuthor()->getNick() ?> (<?= $comment->getAuthor()->getId() ?>)</h4>
            <p><?= $comment->getText() ?></p>
            <p><?= $comment->getDate() ?></p>
            <?= (!empty($user) && ($comment->getAuthor()->getId() === $user->getId() || $user->getRole() === 'admin')) ? '<a href="/PHP_Labs/homework/OOP/2/articles/comments/edit/' . $comment->getId() . '">Редактировать комментарий</a>' . '<a href="/PHP_Labs/homework/OOP/2/articles/comments/delete/' . $comment->getId() . '">  Удалить комментарий</a>' : '' ?>
        </div>
    <?php endforeach;?>
    <script>
        let addCommentBtn = document.querySelector('.add-comment-btn')
        let addCommentContainer =document.querySelector('.add-comment-container')
        
        if (addCommentBtn) {
            addCommentBtn.addEventListener('click', ()=> {
                if (addCommentContainer.style.display === 'none') {
                    addCommentContainer.style.display = 'block'
                }
                else {
                    addCommentContainer.style.display = 'none'
                }
            })
        }
    </script>
<?php include __DIR__ . '/../footer.php'; ?>