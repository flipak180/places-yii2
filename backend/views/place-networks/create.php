<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PlaceNetwork */

$this->title = 'Добавление сети заведений';
$this->params['breadcrumbs'][] = ['label' => 'Сети заведений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="place-network-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>