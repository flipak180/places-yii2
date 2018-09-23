<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use himiklab\thumbnail\EasyThumbnailImage;
use kartik\select2\Select2;
use kartik\rating\StarRating;
use dosamigos\ckeditor\CKEditor;
use common\models\User;
use common\models\City;
use common\models\District;
use common\models\Place;
use common\models\Comfort;
use common\models\PlaceNetwork;

/* @var $this yii\web\View */
/* @var $model common\models\Place */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU');
?>

<div class="place-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'form-control alias-source']) ?>
    <?= $form->field($model, 'alias')->textInput(['maxlength' => true, 'class' => 'form-control alias-target']) ?>
	<?= $form->field($model, 'user_id')->widget(Select2::classname(), [
		'data' => ArrayHelper::map(User::find()->where(['role' => User::ROLE_OWNER])->all(), 'id', 'email'),
		'options' => ['placeholder' => 'Выберите владельца'],
		'pluginOptions' => [
			'allowClear' => true
		],
	]); ?>
	<?= $form->field($model, 'city_id')->widget(Select2::classname(), [
		'data' => ArrayHelper::map(City::find()->orderBy('name ASC')->all(), 'id', 'name'),
		'options' => ['placeholder' => 'Выберите город'],
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
    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    <div id="place-map" data-coords="<?= $model->city ? $model->city->coords : '' ?>"></div>
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
    <?= $form->field($model, 'rating')->widget(StarRating::classname(), [
        'pluginOptions' => ['step' => 1, 'showClear' => false, 'displayOnly' => true]
    ]) ?>
    <?= $form->field($model, 'images_field[]')->widget(FileInput::classname(), [
        'options' => [
            'multiple' => true,
            'accept' => 'image/*'
        ],
        'pluginOptions' => [
            'browseLabel' => 'Выбрать',
            'showPreview' => false,
            'showUpload' => false,
            'showRemove' => false,
        ]
    ]); ?>
    <?php if (count($model->images)): ?>
        <ul id="sortable_photoes" class="photo-list" data-url="<?= Url::to(['sort-images']) ?>">
            <?php foreach ($model->images as $image): ?>
                <li data-id="<?= $image->id ?>">
                    <?= EasyThumbnailImage::thumbnailImg(Yii::getAlias('@frontend_web').$image->path, 160, 160, EasyThumbnailImage::THUMBNAIL_OUTBOUND) ?>
                    <?= Html::a('<span class="glyphicon glyphicon-repeat"></span>', ['rotate-image', 'id' => $image->id, 'angle' => 90], ['class' => 'btn btn-xs btn-primary rotate-image']) ?>
                    <?= Html::a('Удалить', ['delete-image', 'id' => $image->id], ['class' => 'btn btn-xs btn-danger delete-image']) ?>
                </li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
    <?= $form->field($model, 'comforts_field')->checkboxList(ArrayHelper::map(Comfort::find()->all(), 'id', 'name')) ?>
    <?= $form->field($model, 'similar_field')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Place::find()->orderBy('name ASC')->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Выберите заведения', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <?= $form->field($model, 'network_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(PlaceNetwork::find()->orderBy('name ASC')->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Выберите сеть'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    <?= $form->field($model, 'total_views')->input('number') ?>
    <?= $form->field($model, 'total_likes')->input('number') ?>
    <?= $form->field($model, 'status')->dropDownList($model->statusArr) ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>