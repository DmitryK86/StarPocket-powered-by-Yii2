<?php
/**
 * Class RegisterModel
 */

namespace app\models;


use yii\db\ActiveRecord;

class RegisterModel extends ActiveRecord
{
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['username', 'string', 'max' => 15],
            ['password', 'string', 'min' => 6],
            ['username', 'validateUsername'],
        ];
    }

    public function validateUsername($attribute, $params)
    {
        if (User::findByUsername($attribute)){
            $this->addError($attribute, 'Логин уже занят');
        }
    }
}