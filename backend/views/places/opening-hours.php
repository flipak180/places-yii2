<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Place */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заведения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$opening_hours = [];
foreach ($model->openingHours as $openingHour) {
    $opening_hours[$openingHour->weekday][$openingHour->hour] = 1;
}
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
    <div class="shedule-buttons">
        <?= Html::button('Отметить всё', ['class' => 'btn btn-xs btn-success', 'id' => 'shedule-check']) ?>
        <?= Html::button('Снять всё', ['class' => 'btn btn-xs btn-default', 'id' => 'shedule-uncheck']) ?>
    </div>
    <?php $form = ActiveForm::begin(); ?>
        <div id="sheduler">
            <?php foreach ([1 => 'ПН', 2 => 'ВТ', 3 => 'СР', 4 => 'ЧТ', 5 => 'ПТ', 6 => 'СБ', 0 => 'ВС'] as $key => $weekday): ?>
                <div class="shedule-row">
                    <div class="shedule-label"><?= $weekday ?></div>
                    <!-- <div class="shedule-checkbox"><input type="checkbox"></div> -->
                    <div class="shedule-empty"></div>
                    <?php for ($i = 0; $i < 24; $i++): ?>
                        <div class="shedule-hour <?= isset($opening_hours[$key][$i]) ? 'active' : '' ?>">
                            <input type="checkbox" name="shedule-hour[<?= $key ?>][<?= $i ?>]" <?= isset($opening_hours[$key][$i]) ? 'checked="checked"' : '' ?> >
                        </div>
                    <?php endfor; ?>
                </div>
            <?php endforeach ?>
            <div class="shedule-row">
                <div class="shedule-empty"></div>
                <div class="shedule-empty"></div>
                <?php for ($i = 0; $i < 24; $i++): ?>
                    <div class="shedule-empty"></div>
                    <!-- <div class="shedule-checkbox"><input type="checkbox"></div> -->
                <?php endfor; ?>
            </div>
            <div class="shedule-row">
                <div class="shedule-empty"></div>
                <div class="shedule-empty"></div>
                <?php for ($i = 0; $i < 24; $i++): ?>
                    <div class="shedule-label"><?= $i ?></div>
                <?php endfor; ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>