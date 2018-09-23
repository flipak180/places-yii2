<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use common\models\City;
use common\models\District;

/* @var $this yii\web\View */
/* @var $model common\models\MetroStation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="metro-station-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(City::find()->orderBy('name ASC')->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Выберите город', 'class' => 'city-select'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <?php if ($model->city_id): ?>
        <?= $form->field($model, 'district_id')->dropDownList(
            ArrayHelper::map(District::find()->where(['city_id' => $model->city_id])->orderBy('name ASC')->all(), 'id', 'name'),
            ['prompt' => 'Выберите район', 'class' => 'form-control district-select']
        ) ?>
    <?php else: ?>
        <?= $form->field($model, 'district_id')->dropDownList([], ['prompt' => 'Сперва выберите город', 'disabled' => true, 'class' => 'form-control district-select']) ?>
    <?php endif ?>
    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>