<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $user app\models\Users */
/* @var $form ActiveForm */
?>
<div class="users-create">
    <a href="<?= Url::toRoute(['users/index']) ?>"><-В список пользователей</a>
    <h1>Изменить пользователя</h1>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($user, 'login') ?>
    <?= $form->field($user, 'password') ?>
    <?= $form->field($user, 'name') ?>
    <?= $form->field($user, 'surname') ?>
    <?= $form->field($user, 'gender')->dropDownList([
        '0' => 'Нет информации',
        '1' => 'Мужской',
        '2' => 'Женский',
    ]) ?>
    <?= $form->field($user, 'email') ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- users-create -->
