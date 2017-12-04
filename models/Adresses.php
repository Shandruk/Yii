<?php

namespace app\models;

use yii\db\ActiveRecord;

class Adresses extends ActiveRecord
{
    public function rules() {
        return [
            [['post_index', 'country', 'city','street', 'home_number'], 'required'],
            [['city', 'street', 'home_number'], 'string', 'max' => 64],
            [['post_index','apartment_number'], 'number'],
            ['country', 'match', 'pattern' => '/^[A-Z]{2}$/'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'post_index' => 'Почтовый индекс',
            'city' => 'Город',
            'country' => 'Страна',
            'street' => 'Улица',
            'home_number' => 'Номер дома',
            'apartment_number' => 'Номер офиса/квартиры',
        ];
    }
}