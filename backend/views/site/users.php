<?php
$this->title = 'Users\'s page';
?>
<a href="/site/new-user" class="btn btn-info">
    Создать нового
</a>
<h2>
    Список пользователей
</h2>
<?php foreach ($model as $user):?>
<p>
    <?= $user->username?>
</p>
<?php endforeach;?>
