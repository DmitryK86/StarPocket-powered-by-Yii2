<?php

namespace app\models;

use yii\db\ActiveRecord;

class Demo extends ActiveRecord {

	public static function tableName() {
		return 'pocket';
	}
}