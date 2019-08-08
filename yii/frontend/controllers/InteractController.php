<?php 
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\ImageUpload;
use common\models\UserExp;
use common\models\Exp;
use common\models\DocForm;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\base\ActionFilter;



if(Yii::$app->user->isGuest){
	// echo "ok";
	echo "<script>";
	header('location:index.php');
	die;
}


class InteractController extends Controller
{
	


	public function actionIndex()
	{

		$model = new ImageUpload();
		
		if (Yii::$app->request->isPost) {
			$model->load(Yii::$app->request->post());
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			if ($model->upload()) {

			}
		}


		return $this->render('index', ['model' => $model]);
		
	}
	public function actionExper()
	{
		$model = new UserExp();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {}

			return $this->render('view',['model' => $model]);
	}
	public function actionForm($id = '',$user = '',$delete = '')
	{
		$model = new UserExp();
		$model->id = $id;
		
		
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {

			$model->saves();
			return $this->redirect('index.php?r=interact%2Fexper');

		}
		else{
			if ($model->load(Yii::$app->request->post())) {
				
			}
			else{

				return $this->renderAjax('_form', ['model' => $model,'id'=> $id,'user'=> $user,'delete'=> $delete]);
			}
			
		}
	}
	public function actionDocument()
	{
		
		$model = new DocForm();

		if (Yii::$app->request->isPost) {
			$model->file = UploadedFile::getInstance($model, 'file');
			// $model->load(Yii::$app->request->post());

			// die;
			
				$model->saves();
			
		}


		return $this->render('doc', ['model' => $model]);

	}
	public function actionDoclete($id = '')
	{
		$model = new DocForm();
		
		$model->delete($id);
		
			return $this->redirect('index.php?r=interact%2Fdocument');
		

	}
	
	
	// public function behaviors()
	// {
	// 	return [
	// 		'access' => [
	// 			'class' => AccessControl::className(),
	// 			'only' => ['logout', 'signup'],
	// 			'rules' => [
	// 				[
	// 					'actions' => ['signup'],
	// 					'allow' => true,
	// 					'roles' => ['?'],
	// 				],
	// 				[
	// 					'actions' => ['logout'],
	// 					'allow' => true,
	// 					'roles' => ['@'],
	// 				],
	// 			],
	// 		],
	// 		'verbs' => [
	// 			'class' => VerbFilter::className(),
	// 			'actions' => [
	// 				'logout' => ['post'],
	// 			],
	// 		],
	// 	];
	// }
}