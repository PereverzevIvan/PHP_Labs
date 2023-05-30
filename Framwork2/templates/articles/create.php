<?php include __DIR__.'\..\main\header.php' ?>
    <form action="/Framwork2/www/articles/store" method="post">
    <div class="container">
        <input type="text" name="name" id="">
        <input type="text" name="text" id="">
        <select name="authorId" id="">
            <?php foreach($users as $user):?>
                <option value="<?=$user->getId();?>"><?=$user->getNickname();?></option>
            <?php endforeach;?>
        </select>
        <button type="submit">Добавить</button>
    </div>
    </form>
<?php include __DIR__.'\..\main\footer.php' ?>
