<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Place */
?>

<ul class="nav nav-tabs">
    <li <?= Yii::$app->controller->action->id == 'view' ? 'class="active"' : '' ?> >
    	<a href="<?= Url::to(['places/view', 'id' => $model->id]) ?>">Общее</a>
    </li>
    <li <?= Yii::$app->controller->action->id == 'view-reviews' ? 'class="active"' : '' ?> >
    	<a href="<?= Url::to(['places/view-reviews', 'id' => $model->id]) ?>">Отзывы (<?= count($model->reviews) ?>)</a>
    </li>
</ul>