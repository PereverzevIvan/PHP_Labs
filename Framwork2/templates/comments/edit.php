<?php include __DIR__.'\..\main\header.php' ?>
    <form action="/Framwork2/www/comments/add/<?= $comment->getId(); ?>" method="post">
    <select name="authorId" id="">
        <?php foreach ($users as $user): ?>
            <option value="<?= $user->getId(); ?>" <?php if($user->getId()==$comment->getAuthorId()){ echo 'selected';} ?>><?= $user->getNickname();?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="comment" id="" value=<?= $comment->getComment(); ?>>
    <input type="text" name="date" id="" value=<?= $comment->getDate(); ?>>
    <button type="submit">Изменить</button>
</form>
<?php include __DIR__.'\..\main\footer.php' ?>



