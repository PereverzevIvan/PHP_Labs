<?php include __DIR__.'\..\main\header.php' ?>
    <form action="/Framwork2/www/articles/add/<?= $article->getId(); ?>" method="post">
    <div class="container">
        <input type="text" name="name" id="" value =<?=$article->getName();?> >
        <input type="text" name="text" id="" value =<?=$article->getText();?> >
        <input type="text" name="authorId" id="" value =<?=$article->getAuthorId()->getNickname();?>>
        <input type="hidden" name="author_id" value=<?=$article->getAuthorId()->getId();?>>
        <button type="submit">Добавить</button>
    </div>
    </form>
<?php include __DIR__.'\..\main\footer.php' ?>

