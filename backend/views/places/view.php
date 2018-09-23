<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use himiklab\thumbnail\EasyThumbnailImage;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Place */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заведения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$model->comforts_field = ArrayHelper::getColumn($model->getComforts()->all(), 'name');
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
    <div class="images">
        <?php if (count($model->images)): ?>
            <?php foreach ($model->images as $image): ?>
                <div class="image">
                    <?= EasyThumbnailImage::thumbnailImg(Yii::getAlias('@frontend_web').$image->path, 160, 160, EasyThumbnailImage::THUMBNAIL_OUTBOUND) ?>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
    <pre>
        <?= $model->description ?>
    </pre>
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
            [
                'attribute' => 'city_id',
                'format' => 'raw',
                'value' => $model->city ? Html::a($model->city->name, ['cities/view', 'id' => $model->city_id]) : '-',
            ],
            [
                'attribute' => 'district_id',
                'format' => 'raw',
                'value' => $model->district ? Html::a($model->district->name, ['districts/view', 'id' => $model->district_id]) : '-',
            ],
            [
                'attribute' => 'network_id',
                'format' => 'raw',
                'value' => $model->network ? Html::a($model->network->name, ['place-networks/view', 'id' => $model->network_id]) : '-',
            ],
            'latitude',
            'longitude',
            'address',
            'phone',
            'website',
            'introtext:ntext',
            [
                'attribute' => 'comforts_field',
                'format' => 'raw',
                'value' => implode('<br>', $model->comforts_field),
            ],
            'rating',
            'total_views',
            'total_likes',
			[
				'attribute' => 'status',
				'value' => $model->statusName,
			],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>
</div>