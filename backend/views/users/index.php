<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'email:email',
            'name',
            'balance',
            //'avatar',
            //'place_id',
            //'description:ntext',
            [
                'attribute' => 'role',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->roleName;
                },
                'filter' => Html::activeDropDownList($searchModel, 'role', $searchModel->roleArr, ['class'=>'form-control', 'prompt' => 'Не важно']),
            ],
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