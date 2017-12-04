<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Users;
use app\models\Adresses;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $query = Users::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $users = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'users' => $users,
            'pagination' => $pagination,
        ]);
    }

    public function actionView($id)
    {
        $user = Users::findOne($id);
        $query = Adresses::find()->where(['user_id' => $id]);

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count()
        ]);

        $adresses = $query->orderBy('city')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('view', [
            'user' => $user,
            'adresses' => $adresses,
            'pagination' => $pagination
        ]);
    }

    public function actionCreate()
    {
        $user = new Users();
        $adress = new Adresses();

        if (isset($_POST['Users']) && isset($_POST['Adresses'])) {
            $user->attributes=$_POST['Users'];
            $adress->attributes=$_POST['Adresses'];
            if ($user->save()) {
                $adress->user_id = $user->id;
                if ($adress->save()) {
                    return $this->redirect(['view', 'id' => $user->id]);
                }
            }
        } else {
            return $this->render('create', [
                'user' => $user,
                'adress' => $adress
            ]);
        }

    }

    public function actionUpdateUser($id)
    {
        $user = Users::findOne($id);

        if ($user->load(Yii::$app->request->post()) && $user->save()) {
            return $this->redirect(['view', 'id' => $user->id]);
        } else {
            return $this->render('update_user', [
                'user' => $user,
            ]);
        }
    }

    public function actionUpdateAdress($id)
    {
        $adress = Adresses::findOne($id);

        if ($adress->load(Yii::$app->request->post()) && $adress->save()) {
            return $this->redirect(['view', 'id' => $adress->user_id]);
        } else {
            return $this->render('update_adress', [
                'adress' => $adress,
            ]);
        }
    }

    public function actionDeleteUser($id)
    {
        $user = Users::findOne($id);
        $user->delete();
        return $this->redirect(['index']);
    }

    public function actionDeleteAdress($id)
    {
        $adress = Adresses::findOne($id);
        $adress->delete();
        return $this->redirect(['users/view', 'id' => $adress->user_id]);
    }

    public function actionAddAdress($id)
    {
        $user = Users::findOne($id);
        $adress = new Adresses();

        if (isset($_POST['Adresses'])) {
            $adress->attributes=$_POST['Adresses'];
            $adress->user_id=$id;
            if ($adress->save()) {
                return $this->redirect(['view', 'id' => $user->id]);
            }
        } else {
            return $this->render('add_adress', [
                'user' => $user,
                'adress' => $adress
            ]);
        }

    }

}