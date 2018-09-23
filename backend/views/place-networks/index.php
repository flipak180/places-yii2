<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PlaceNetworksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сети заведений';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="place-network-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Добавить сеть заведений', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            'alias',
            [
                'attribute' => 'user_id',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->user ? Html::a($data->user->name, ['users/view', 'id' => $data->user_id]) : '-';
                },
                'filter' => Html::activeDropDownList($searchModel, 'user_id', ArrayHelper::map(User::find()->orderBy('name ASC')->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => '']),
            ],
            //'description:ntext',
            'created_at:datetime',
            //'updated_at:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>