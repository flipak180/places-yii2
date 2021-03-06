<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
    <?= Html::csrfMetaTags() ?>
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
            'innerContainerOptions' => ['class'=>'container-fluid'],
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        if (Yii::$app->user->isGuest) {
            $menuItems = [['label' => '<span class="glyphicon glyphicon-log-in"></span>', 'url' => ['/site/login']]];
        } else {
            $menuItems = [
                ['label' => 'Пользователи', 'url' => ['/users/index']],
                ['label' => 'Заведения', 'url' => ['/places/index']],
                ['label' => 'Отзывы', 'url' => ['/reviews/index']],
                ['label' => 'Справочники', 'items' => [
                    ['label' => 'Города', 'url' => ['/cities/index']],
                    ['label' => 'Районы', 'url' => ['/districts/index']],
                    ['label' => 'Станции метро', 'url' => ['/metro-stations/index']],
                    ['label' => 'Удобства', 'url' => ['/comforts/index']],
                    ['label' => 'Сети заведений', 'url' => ['/place-networks/index']],
                ]],
                //['label' => '<span class="glyphicon glyphicon-cog"></span>', 'url' => ['/']],
                ['label' => '<span class="glyphicon glyphicon-log-out"></span>', 'url' => ['/site/logout']],
            ];
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'encodeLabels' => false,
            'items' => $menuItems,
        ]);
        NavBar::end();
    ?>
    <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<footer class="footer">
    <div class="container-fluid">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>