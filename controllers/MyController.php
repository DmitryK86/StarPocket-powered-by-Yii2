<?php
namespace app\controllers;
use yii\web\Controller;
use yii\web\Session;
use app\models\TestForm;
use app\models\Demo;

use Yii;

/**
* 
*/
class MyController extends Controller
{
	public $layout = 'basic';
	
	public function actionIndex()
	{

		$this->view->title = 'Star Pocket';
		return $this->render('index');
	}

	public function actionDemo()
	{

		
		$post = Yii::$app->request->post();
		$model = new TestForm;
		if ($model->load($post)) {
		
			if ($model->validate()) {
				Yii::$app->session->setFlash('success', 'Данные записаны!');
				
			}
			
		}

		$this->view->title = 'Demo';
		return $this->render('demo', compact('model'));
	}

	public function actionLogin()
	{

		$demo = Demo::find()->all();
		return $this->render('login', compact('demo'));
	}
}