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
    <?php $form = ActiveForm::begin(); ?>
    <h1>Новый пользователь</h1>
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
    <h1>Адрес доставки</h1>
        <?= $form->field($adress, 'post_index') ?>
        <?= $form->field($adress, 'city') ?>
        <?= $form->field($adress, 'country') ?>
        <?= $form->field($adress, 'street') ?>
        <?= $form->field($adress, 'home_number') ?>
        <?= $form->field($adress, 'apartment_number') ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- users-create -->
