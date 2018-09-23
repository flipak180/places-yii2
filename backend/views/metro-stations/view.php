<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MetroStation */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Станции метро', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="metro-station-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'city_id',
                'format' => 'raw',
                'value' => $model->city ? Html::a($model->city->name, ['cities/view', 'id' => $model->city_id]) : '-',
            ],
            [
                'attribute' => 'district_id',
                'format' => 'raw',
                'value' => $model->district ? Html::a($model->district->name, ['districts/view', 'id' => $model->district_id]) : '-',
            ],
            'longitude',
            'latitude',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>
</div>