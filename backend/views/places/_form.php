<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use himiklab\thumbnail\EasyThumbnailImage;
use kartik\select2\Select2;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Place */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="place-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'user_id')->textInput() ?>
    <?= $form->field($model, 'city_id')->textInput() ?>
    <?= $form->field($model, 'coordinates')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'introtext')->widget(CKEditor::classname(), [
		'options' => ['rows' => 6],
		'preset' => 'full',
	]) ?>
	<?= $form->field($model, 'description')->widget(CKEditor::classname(), [
		'options' => ['rows' => 6],
		'preset' => 'full',
	]) ?>
    <?= $form->field($model, 'rating')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'total_views')->textInput() ?>
    <?= $form->field($model, 'total_likes')->textInput() ?>
    <?= $form->field($model, 'status')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>