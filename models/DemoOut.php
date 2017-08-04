<?php

namespace app\models;

use yii\db\ActiveRecord;

class DemoOut extends ActiveRecord {

	public $dateFrom;
	public $dateTo;

	public static function tableName() {
		return 'demo_pocket';
	}

	public function attributeLabels() {
		return [
			'dateFrom'=>'Дата с:',
			'dateTo'=>'По:',
			'opt'=>'Выбирите операцию:'
		];
	}

	public function rules() {
		return [
			[['dateFrom', 'dateTo', 'opt'], 'trim'],
		];
	}
}