<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $user app\models\Adresses */
/* @var $form ActiveForm */
?>
<div class="users-create">
    <a href="<?= Url::toRoute(['users/view', 'id' => $adress->user_id]) ?>"><-Назад к пользователю</a>
    <?php $form = ActiveForm::begin(); ?>
    <h1>Изменить адрес</h1>
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

</div>
