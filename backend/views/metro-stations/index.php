<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\City;
use common\models\District;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MetroStationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Станции метро';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="metro-station-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Добавить станцию метро', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            [
                'attribute' => 'city_id',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->city ? Html::a($data->city->name, ['cities/view', 'id' => $data->city_id]) : '-';
                },
                'filter' => Html::activeDropDownList($searchModel, 'city_id', ArrayHelper::map(City::find()->orderBy('name ASC')->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => '']),
            ],
            [
                'attribute' => 'district_id',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->district ? Html::a($data->district->name, ['districts/view', 'id' => $data->district_id]) : '-';
                },
                'filter' => Html::activeDropDownList($searchModel, 'district_id', ArrayHelper::map(District::find()->orderBy('name ASC')->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => '']),
            ],
            //'longitude',
            //'latitude',
            'created_at:datetime',
            //'updated_at:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>