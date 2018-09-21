<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Place */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заведения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="place-view">
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
    <?= $this->render('_tabs', ['model' => $model]) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            [
                'attribute' => 'user_id',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->user ? Html::a($data->user->name, ['users/view', 'id' => $data->user_id]) : '-';
                },
                'filter' => Html::activeDropDownList($searchModel, 'user_id', ArrayHelper::map(User::find()->orderBy('name ASC')->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => '']),
            ],
            //'text:ntext',
            'rating',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->statusName;
                },
                'filter' => Html::activeDropDownList($searchModel, 'status', $searchModel->statusArr, ['class'=>'form-control', 'prompt' => 'Не важно']),
            ],
            'created_at:datetime',
            //'updated_at:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>