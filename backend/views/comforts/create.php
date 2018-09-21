<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Comfort */

$this->title = 'Добавление удобства';
$this->params['breadcrumbs'][] = ['label' => 'Удобства', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="comfort-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>