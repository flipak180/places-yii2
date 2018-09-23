<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use common\models\City;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\District */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="district-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
		'data' => ArrayHelper::map(City::find()->orderBy('name ASC')->all(), 'id', 'name'),
		'options' => ['placeholder' => 'Выберите город'],
		'pluginOptions' => [
			'allowClear' => true
		],
	]); ?>
	<?= $form->field($model, 'seo_text')->widget(CKEditor::classname(), [
		'options' => ['rows' => 6],
		'preset' => 'full',
	]) ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>