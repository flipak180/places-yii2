<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PlaceReview */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Отзывы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="place-review-view">
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
    <pre>
        <?= $model->text ?>
    </pre>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'place_id',
                'format' => 'raw',
                'value' => $model->place ? Html::a($model->place->name, ['places/view', 'id' => $model->place_id]) : '-',
            ],
            [
                'attribute' => 'user_id',
                'format' => 'raw',
                'value' => $model->user ? Html::a($model->user->name, ['users/view', 'id' => $model->user_id]) : '-',
            ],
            'rating',
            [
                'attribute' => 'status',
                'value' => $model->statusName,
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>
</div>