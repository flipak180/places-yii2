<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PlaceNetwork */

$this->title = 'Редактирование сети заведений: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Сети заведений', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

<div class="place-network-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>