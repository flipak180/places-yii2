<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\City;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PlacesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заведения';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="place-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Добавить заведение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            //'alias',
            [
                'attribute' => 'user_id',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->user ? Html::a($data->user->name, ['users/view', 'id' => $data->user_id]) : '-';
                },
                'filter' => Html::activeDropDownList($searchModel, 'user_id', ArrayHelper::map(User::find()->orderBy('name ASC')->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => '']),
            ],
            [
                'attribute' => 'city_id',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->city ? Html::a($data->city->name, ['cities/view', 'id' => $data->city_id]) : '-';
                },
                'filter' => Html::activeDropDownList($searchModel, 'city_id', ArrayHelper::map(City::find()->orderBy('name ASC')->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => '']),
            ],
            //'coordinates',
            //'address',
            //'phone',
            //'website',
            //'introtext:ntext',
            //'description:ntext',
            //'rating',
            //'total_views',
            //'total_likes',
			[
				'attribute' => 'status',
				'format' => 'raw',
				'value' => function($data) {
					return $data->statusName;
				},
				'filter' => Html::activeDropDownList($searchModel, 'status', $searchModel->statusArr, ['class'=>'form-control', 'prompt' => 'Не важно']),
			],
            //'created_at',
            //'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>