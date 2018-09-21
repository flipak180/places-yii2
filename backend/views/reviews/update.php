<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PlaceReview */

$this->title = 'Редактирование отзыва: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Отзывы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

<div class="place-review-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'features' => $features,
    ]) ?>
</div>