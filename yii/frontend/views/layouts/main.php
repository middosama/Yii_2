<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

use common\widgets\Alert;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse',
            ],
        ]);

        // $menuItems = [
        //     ['label' => 'aaa', 'url' => ['/site/index']],
        //     ['label' => 'About', 'url' => ['/site/about']],
        //     ['label' => 'Contact', 'url' => ['/site/contact']],
        // ];
        if (Yii::$app->user->isGuest) {
            //
 

            $menuItems[] = ['label' => 'Trang chủ', 'url' => ['/site/index']];
            
            $menuItems[] = ['label' => 'Đăng kí', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => 'Đăng nhập', 'url' => ['/site/login']];
        } else {
            //
            $menuItems[] = ['label' => 'Trang chủ', 'url' => ['/interact/index']];
            $menuItems[] = ['label' => 'Kinh nghiệm', 'url' => ['/interact/exper']]; 
            $menuItems[] = ['label' => 'Văn bản', 'url' => ['/interact/document']];
            //
            $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Đăng xuất (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
               
            )
            . Html::endForm()
            . '</li>';
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
<script>
    $('.logout').click(function(event) {
        sessionStorage.reload = 0;
    });
</script>
</html>
<?php $this->endPage() ?>
