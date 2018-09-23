<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use dosamigos\ckeditor\CKEditor;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\PlaceNetwork */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="place-network-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'form-control alias-source']) ?>
    <?= $form->field($model, 'alias')->textInput(['maxlength' => true, 'class' => 'form-control alias-target']) ?>
    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(User::find()->orderBy('name ASC')->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Выберите пользователя'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <?= $form->field($model, 'description')->widget(CKEditor::classname(), [
        'options' => ['rows' => 6],
        'preset' => 'full',
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>