<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MetroStation */

$this->title = 'Добавление станции метро';
$this->params['breadcrumbs'][] = ['label' => 'Станции метро', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="metro-station-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>