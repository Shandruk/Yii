<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1>Пользователи</h1>
    <input type="button"  value="Добавить пользователя" onClick='location.href="<?= Url::toRoute(['users/add-adress', 'id' => $user->id]) ?>"' class="btn btn-primary btn-md">
    <table class="table table-bordered table-responsive">
    <thead>
    <tr>
        <th>ID</th>
        <th>Логин</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Пол</th>
        <th>Дата создания</th>
        <th>E-mail</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <td><?= Html::encode("{$user->id}") ?></td>
            <td><?= Html::encode("{$user->login}") ?></td>
            <td><?= Html::encode("{$user->name}") ?></td>
            <td><?= Html::encode("{$user->surname}") ?></td>
            <?php if ($user->gender=='0') { ?>
                <td>Нет информации</td>
            <?php } elseif ($user->gender=='1') { ?>
                <td>Мужской</td>
            <?php } else { ?>
                <td>Женский</td>
            <?php } ?>
            <?php $date = date_create($user->date_created); ?>
            <td><?= Html::encode(date_format($date, 'd-m-Y H:i')) ?></td>
            <td><?= Html::encode("{$user->email}") ?></td>
            <td><input type="button"  value="Посмотреть" onClick='location.href="<?= Url::toRoute(['users/view', 'id' => $user->id]) ?>"' class="btn btn-primary btn-xs">
            <input type="button"  value="Изменить" onClick='location.href="<?= Url::toRoute(['users/update-user', 'id' => $user->id]) ?>"' class="btn btn-primary btn-xs">
            <input type="button"  value="Удалить" onClick='location.href="<?= Url::toRoute(['users/delete-user', 'id' => $user->id]) ?>"' class="btn btn-primary btn-xs"></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>

<?= LinkPager::widget(['pagination' => $pagination]) ?>