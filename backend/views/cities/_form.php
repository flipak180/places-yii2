<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'form-control alias-source']) ?>
    <?= $form->field($model, 'alias')->textInput(['maxlength' => true, 'class' => 'form-control alias-target']) ?>
    <?= $form->field($model, 'time_shift')->input('number') ?>
    <?= $form->field($model, 'seo_text')->widget(CKEditor::classname(), [
        'options' => ['rows' => 6],
        'preset' => 'full',
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>