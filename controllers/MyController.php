<?php
namespace app\controllers;

use yii\web\Controller;
use yii\web\Session;
use app\models\DemoIn;
use app\models\DemoOut;
use app\models\LoginForm;
use yii\web\Response;
require __DIR__.'/../functions.php';

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
		
		$modelIn = new DemoIn;
		$modelOut = new DemoOut;
		

		
		if ($modelIn->load($post)) {
			$modelIn->ip = $_SERVER['REMOTE_ADDR'];
			$modelIn->value = abs($modelIn->value);
			$isSave = $modelIn->save();
		
			if ($isSave) {
				Yii::$app->session->setFlash('success', 'Данные записаны!');
				return $this->refresh();				
			}else{
				Yii::$app->session->setFlash('error', 'Ошибка!');
			}
			
		}

		$this->view->title = 'Demo';
		return $this->render('demo', compact('modelIn', 'modelOut', 'showData'));
	}

	public function actionDemoOut()
	{

		$checkAjax = Yii::$app->request->isAjax;
		$modelOut = new DemoOut;

		
		if ($checkAjax && $modelOut->validate()) {
			$dateFrom = $_POST['from'];
			$dateTo = $_POST['to'];
			$opt = $_POST['opt'];
			$btnName = $_POST['name'];
			$ip = $_SERVER['REMOTE_ADDR'];
			
					
			$query = createQuery($opt, $ip);
			$demo = array();
			if ($opt == 'all') {
				$demo = DemoOut::findBySql($query, [':dateFrom'=>$dateFrom, ':dateTo'=>$dateTo])->asArray()->all();
			}else{
				$demo = DemoOut::findBySql($query, [':dateFrom'=>$dateFrom, ':dateTo'=>$dateTo, 'opt'=>$opt])->asArray()->all();
			}
			if ($btnName == 'period') {
				$demo = makeGoodArray($demo);
			}else{
				$demo = makeBadArray($demo);
			}
			return json_encode($demo);
	
		}else{
			return "error!";
		}
	}

	

		public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
		
	
}