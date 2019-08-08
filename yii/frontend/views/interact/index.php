<?php
use yii\helpers\Html;
use frontend\assets\InterAsset;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use yii\jui\DatePicker;
/* @var $model frontend\models\ImageUpload  */

InterAsset::register($this);

// echo "<pre>";
// // print_r($info);
// print_r($model);
// print_r(Yii::$app->user->identity);


if (isset($model->firstname)) {

	$info = $model;
}else{
	$info = Yii::$app->user->identity;
}

$this->title = 'Profile';

?>

<style>
	#avatar{background-image: url('../../frontend/web/uploads/<?= Yii::$app->user->identity->avatar?>'),url('../../../frontend/web/uploads/<?= Yii::$app->user->identity->avatar?>');}
</style>
<div class="body">
	
	<div class="site-about">
		<!-- <h1><?= Html::encode($this->title) ?></h1> -->
		<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
		<div class="container">
			<!-- <form action=""> -->



				<div class="col-xs-4">
					<label id="avatar" for="imageupload-imagefile">
						<?= $form->field($model, 'imageFile')->fileInput() ?> 
					</label>
				</div>
				<div class="col-xs-8">
					<div class="padding-right">
						
						<h2 class="underline">
							Thông tin người dùng
						</h2>
						<?= $form->field($model, 'firstname')->textInput()->input('text',["value"=> $info->firstname,'placeholder'=>'Nhập tên họ'])?>
						<?= $form->field($model, 'lastname')->textInput()->input('text',["value"=> $info->lastname,'placeholder'=>'Nhập tên gọi']) ?>
						<?= $form->field($model, 'phone')->textInput()->input('text',["value"=> $info->phone,'placeholder'=>'Nhập số điện thoại']) ?>
						<?= $form->field($model, 'birthday')->widget(DatePicker::class, [
							'options' => ['class' => 'form-control'],
							'dateFormat' => 'yyyy-MM-dd'
						]
					)->input('date',["value"=> $info->birthday])?>
				</div>
			</div>
			<!-- </form> -->
		</div>
		<br>
		<div class="button container padding-right">
			<div class="col-xs-6">
				<button href="interact/exper" class="btn btn-success">Lưu lại</button>

			</div>
			<div class="col-xs-6">
				<button type="reset" class="btn btn-warning">Hoàn tác</button>

			</div>
		</div>
		<br>
		<?php ActiveForm::end() ?>
	</div>


</div>



