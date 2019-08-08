<?php
use yii\widgets\ActiveForm;
use frontend\assets\InterAsset;

InterAsset::register($this);
$doc = $model->getDocList();
?>

<div class="body container">
	<div class="col-xs-7 col-md-9">
		<h3>Danh sách đã tải lên</h3>
		<?php foreach ($doc as $key => $val) : ?>
			<div class="thumbnail">
				<div class="icon">
					<img src="../../frontend/web/<?php 
					if($val->extend == 'jpg' || $val->extend == 'png' || $val->extend == 'gif' )
					{
						echo 'uploads/'.$val->dir_name;
						}else{
							echo 'icons/'.$val->extend.'.jpg';
						}
						?>" >
					</div>
					<div class="button">
						<a href="../../frontend/web/uploads/<?= $val->dir_name ?>"><button class="btn btn-primary">Download <i class="glyphicon glyphicon-download-alt"></i></button></a>
						<button onclick="deletes(confirm('Chắc chắn xóa tệp này?'),<?= $val->id ?>,'doclete&&id=')" class="btn btn-danger">Xóa <i class="	glyphicon glyphicon-trash"></i></button>
					</div>
					<h3><?= $val->name.'.'.$val->extend ?></h3>
					<div class="descript">
						<?= $val->des ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="col-xs-5 col-md-3 upload">
			
				
				<h3>Tải tệp lên</h3>
				<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

				<?= $form->field($model, 'file')->fileInput() ?>
				<label style="width: 100%" for="docform-file" class="glyphicon glyphicon-open btn btn-info btn-lg">Upload</label><p id="file_name"></p>
				
				

				<?= $form->field($model, 'des')->textarea(['rows'=>6]) ?>
				<button class="btn btn-success">Xác nhận</button>

				<?php ActiveForm::end() ?>
			
		</div>
	</div>