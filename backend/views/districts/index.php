<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\City;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DistrictsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Районы';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="district-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Добавить район', ['create'], ['class' => 'btn btn-success']) ?>
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
            //'seo_text:ntext',
            'created_at:datetime',
            //'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>