<?php include __DIR__ . '/../header.php'; ?>
<div style="text-align: center;">
    <h1>Регистрация прошла успешно!</h1>
    Ссылка для активации вашей учетной записи отправлена вам на email.
    <a href="/PHP_Labs/homework/OOP/2/users/<?=$userId?>/activate/<?=$user_code?>">Активировать аккаунт</a>
</div>
<?php include __DIR__ . '/../footer.php'; ?>