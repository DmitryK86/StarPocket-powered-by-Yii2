<?php

namespace app\models;

use yii\db\ActiveRecord;

class DemoIn extends ActiveRecord {

	public static function tableName() {
		return 'demo_pocket';
	}

	public function attributeLabels() {
		return [
			'date'=>'Выбирите дату:',
			'value'=>'Введите сумму:',
			'opt'=>'Выбирите операцию:'
		];
	}

	public function rules() {
		return [
			['value', 'required'],
			['value', 'integer'],
			[['date', 'opt'], 'trim'],
		];
	}
}