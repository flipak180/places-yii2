<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\rating\StarRating;
use common\models\User;
use common\models\Place;

/* @var $this yii\web\View */
/* @var $model common\models\PlaceReview */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="place-review-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'place_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Place::find()->orderBy('name ASC')->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Выберите заведение'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(User::find()->orderBy('name ASC')->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Выберите пользователя'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <?= $form->field($model, 'text')->widget(CKEditor::classname(), [
        'options' => ['rows' => 6],
        'preset' => 'full',
    ]) ?>
    <?php foreach ($features as $key => $name): ?>
        <?= $form->field($model, 'features['.$key.']')->widget(StarRating::classname(), [
            'options' => ['class' => 'features_score'],
            'pluginOptions' => ['step' => 1, 'showClear' => false]
        ])->label($name) ?>
    <?php endforeach ?>
    <?= $form->field($model, 'rating')->widget(StarRating::classname(), [
        'pluginOptions' => ['step' => 1, 'showClear' => false, 'displayOnly' => true]
    ]) ?>
    <?= $form->field($model, 'status')->dropDownList($model->statusArr) ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>