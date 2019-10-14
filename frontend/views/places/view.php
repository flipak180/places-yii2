<?php

/* @var $this yii\web\View */
/* @var $model common\models\Place */

$this->title = $model->name;
?>

<?= $this->render('blocks/heading', ['model' => $model]) ?>
<?= $this->render('blocks/slider', ['model' => $model]) ?>
<?= $this->render('blocks/map', ['model' => $model]) ?>
<?= $this->render('blocks/booking-form', ['model' => $model]) ?>

<div class="two-cols">
    <?= $this->render('blocks/contacts', ['model' => $model]) ?>
    <?= $this->render('blocks/ratings', ['model' => $model]) ?>
</div>

<?= $this->render('blocks/description', ['model' => $model]) ?>
<?= $this->render('blocks/reviews', ['model' => $model]) ?>
<?= $this->render('blocks/closest', ['model' => $model]) ?>
