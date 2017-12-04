<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= Html::encode("{$user->name} {$user->surname}") ?></h1>
    <table class="table table-striped">
        <tr>
            <td>Логин: <?= Html::encode("{$user->login}") ?></td>
        </tr>
        <tr>
            <td>Пароль: <?= Html::encode("{$user->password}") ?></td>
        </tr>
        <tr>
            <td>Пол:
            <?php if ($user->gender=='0') { ?>
                Нет информации
            <?php } elseif ($user->gender=='1') { ?>
                Мужской
            <?php } else { ?>
                Женский
            <?php } ?>
            </td>
        </tr>
        <tr>
        </tr>
        <td>Дата создания: <?= Html::encode("{$user->date_created}") ?></td>
        <tr>
            <td>E-mail: <?= Html::encode("{$user->email}") ?></td>
        </tr>
    </table>
    <h1>Адреса</h1>
    <input type="button"  value="Добавить адрес" onClick='location.href="<?= Url::toRoute(['users/add-adress', 'id' => $user->id]) ?>"' class="btn btn-primary btn-md">
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th>Индекс</th>
            <th>Страна</th>
            <th>Город</th>
            <th>Улица</th>
            <th>Номер дома</th>
            <th>Номер офиса/квартиры</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($adresses as $adress): ?>
            <tr>
                <td><?= Html::encode("{$adress->post_index}") ?></td>
                <td><?= Html::encode("{$adress->country}") ?></td>
                <td><?= Html::encode("{$adress->city}") ?></td>
                <td><?= Html::encode("{$adress->street}") ?></td>
                <td><?= Html::encode("{$adress->home_number}") ?></td>
                <td><?= Html::encode("{$adress->apartment_number}") ?></td>
                <td><input type="button"  value="Изменить" onClick='location.href="<?= Url::toRoute(['users/update-adress', 'id' => $adress->id]) ?>"' class="btn btn-primary btn-xs">
                    <input type="button"  value="Удалить" onClick='location.href="<?= Url::toRoute(['users/delete-adress', 'id' => $adress->id]) ?>"' class="btn btn-primary btn-xs"></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?= LinkPager::widget(['pagination' => $pagination]) ?>