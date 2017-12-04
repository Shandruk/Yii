<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1><a href="<?= Url::toRoute(['users/index']) ?>">В список пользователей >></a></h1>
    </div>
</div>
