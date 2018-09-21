<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PlaceReview */

$this->title = 'Добавление отзыва';
$this->params['breadcrumbs'][] = ['label' => 'Отзывы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="place-review-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'features' => $features,
    ]) ?>
</div>