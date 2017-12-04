<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $name
 * @property string $surname
 * @property integer $gender
 * @property string $date_created
 * @property string $email
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password', 'name', 'surname', 'gender', 'email'], 'required'],
            [['login','email'], 'unique'],
            ['email', 'email'],
            ['login', 'match', 'pattern' => '/^.{4,}$/'],
            ['password', 'match', 'pattern' => '/^.{6,}$/'],
            [['name','surname'], 'match', 'pattern' => '/^[A-ZА-Я]/'],
            ['gender', 'in', 'range' => [0, 1, 2]],
            [['login', 'password', 'name', 'surname', 'email'], 'string', 'max' => 64],
        ];
    }

    public function getAdresses()
    {
        return $this->hasMany(Adresses::className(), ['user_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'gender' => 'Пол',
            'email' => 'Email',
        ];
    }
}
