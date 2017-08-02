<?php

namespace app\models;
use yii\base\Model;


class TestForm extends Model {

	public $date;
	public $dateFrom;
	public $dateTo;
	public $value;
	public $option;

	public function attributeLabels() {
		return [
			'date'=>'Выбирите дату:',
			'dateFrom'=>'С даты:',
			'dateTo'=>'По дату:',
			'value'=>'Введите сумму:',
			'option'=>'Выбирите операцию:'
		];
	}

	public function rules() {
		return [
			['value', 'required'],
			['value', 'double'],
			[['date', 'dateFrom', 'dateTo', 'option'], 'trim'],
		];
	}
}