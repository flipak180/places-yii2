<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php if ($model->avatar): ?>
        <div class="image-preview">
            <?= EasyThumbnailImage::thumbnailImg(Yii::getAlias('@webroot').$model->avatar, 100, 100, EasyThumbnailImage::THUMBNAIL_OUTBOUND) ?>
        </div>
    <?php endif ?>
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
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'email:email',
            'name',
            'balance',
            'description:ntext',
            [
                'attribute' => 'role',
                'value' => $model->roleName,
            ],
            [
                'attribute' => 'status',
                'value' => $model->statusName,
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>
</div>