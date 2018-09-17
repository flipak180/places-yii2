<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
            'alias',
            'user_id',
            'city_id',
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