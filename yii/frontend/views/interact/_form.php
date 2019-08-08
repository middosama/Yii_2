<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\view\Web;
use yii\db\Query;
use yii\widgets\ActiveField;
use yii\jui\DatePicker;
use common\models\Exp;



/* @var $this yii\web\View */
/* @var $model app\models\Exp */
/* @var $form yii\widgets\ActiveForm */
$models =  new Exp;
$models->id = $id;

$userExp = $models->getexp();
// print_r($model);
// print_r($userExp->name);
// die;
if (!empty($user)) {
    $model->setexp($user);
}
if (!empty($delete)) {
    $model->deleteexp($delete);
    return Yii::$app->response->redirect(['interact/exper']);
    // return $this->redirect('exper');
}
?>

<?php $this->beginPage() ?>

<?php $this->head() ?>

<body>
   
    <?php $this->beginBody() ?>
    <div class="exp-form">

        <?php $form = ActiveForm::begin();?>


        <!-- <?= $form->field($model, 'id')->textInput() ?> -->

        <?= $form->field($model, 'name')->textInput()->input('text',["value"=> $userExp->name]) ?>


        <?= $form->field($model, 'start_date')->widget(DatePicker::class, [
            'options' => ['class' => 'form-control'],
            'dateFormat' => 'yyyy-MM-dd'
        ]
    )->input('date',["value"=> $userExp->start_date]) ?>

        <?= $form->field($model, 'end_date')->widget(DatePicker::class, [
            'options' => ['class' => 'form-control hasDatepicker'],
            'dateFormat' => 'yyyy-MM-dd'
        ]
    )->input('date',["value"=> $userExp->end_date]) ?>

    <?= $form->field($model, 'co_name')->textInput(['maxlength' => true])->input('text',["value"=> $userExp->co_name]) ?>

    <?= $form->field($model, 'des')->textarea(['maxlength' => true,'rows' => 5,'value'=>$userExp->des]) ?>

    <div class="form-group">
        <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton('Hoàn tác', ['class' => 'btn btn-warning']) ?>
        <a class="btn btn-danger" onclick="deletes(confirm('Xóa công việc này?'),<?php echo $id ?>,'form&&delete=')"> Xóa </a>
    </div>

    <?php ActiveForm::end(); ?>

</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

