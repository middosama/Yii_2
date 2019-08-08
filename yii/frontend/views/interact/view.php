<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\assets\InterAsset;
use yii\db\Query;
use common\models\UserExp;

// use Yii;

InterAsset::register($this);


$userExp = $model ->getWorkList();


?>


<div class="body container">
    <div class="col-xs-4">
        <div id="work_list" class="list-group work_list">
            <p class="list-group-item list-group-item-action active">
                Danh sách công việc
            </p>
            <?php foreach ($userExp as $key => $val): ?>
            <a data-loadArea="exp_info" data-loadDir="form" data-loadPara="id=<?= $val->id ?>" data-reload=1 class="list-group-item list-group-item-action load-button"><?= $val->name ?></a>
            <?php endforeach; ?>
            <a href="" class="list-group-item list-group-item-action list-group-item-success load-button" data-loadArea="work_list" data-loadDir="form" data-loadPara="user=<?= Yii::$app->user->identity->id ?>" data-reload=0>
                <i class="glyphicon glyphicon-plus-sign"></i>
                Thêm công việc mới
            </a>

        </div>
    </div>
    <div id="exp_info" class="col-xs-8">
        
    </div>
</div>


