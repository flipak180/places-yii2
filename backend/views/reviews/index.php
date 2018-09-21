<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Place;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReviewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="place-review-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Добавить отзыв', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            //'name',
            [
                'attribute' => 'place_id',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->place ? Html::a($data->place->name, ['places/view', 'id' => $data->place_id]) : '-';
                },
                'filter' => Html::activeDropDownList($searchModel, 'place_id', ArrayHelper::map(Place::find()->orderBy('name ASC')->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => '']),
            ],
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