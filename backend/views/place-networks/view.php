<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PlaceNetwork */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Сети заведений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="place-network-view">
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
    <pre><?= $model->description ?></pre>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'alias',
            [
                'attribute' => 'user_id',
                'format' => 'raw',
                'value' => $model->user ? Html::a($model->user->name, ['users/view', 'id' => $model->user_id]) : '-',
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>
</div>