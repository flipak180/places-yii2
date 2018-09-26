<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\assets\OpeningHoursAsset;

OpeningHoursAsset::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\Place */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заведения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

// https://github.com/spatie/opening-hours
// https://github.com/opening-hours/opening_hours.js/tree/master
// http://projets.pavie.info/yohours/
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

    <div class=" main">
        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'form-horizontal row-line', 'id' => 'opening_hours']
        ]); ?>
            <div id="oh-form" class="form-group">
                <div class="col-xs-3 text-center">
                    <span class="osm-tag"><span class="osm-key">opening_hours</span>=</span>
                </div>
                <div class="col-xs-7">
                    <?= $form->field($model, 'opening_hours')->textInput(['id' => 'oh'])->label(false) ?>
                </div>
                <div class="col-xs-2">
                    <a role="button" id="oh-clear" class="btn btn-default">Сбросить</a>
                    <button type="submit" class="btn btn-success">Сохранить</a>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
        
        <p id="oh-valid-alert" class="hide alert alert-warning">
            This value is valid, but too complex to be shown here. You can use <a href="http://openingh.openstreetmap.de/evaluation_tool/">the opening_hours evaluation tool</a> to read it.
        </p>
        
        <ul id="range-nav" class="nav nav-tabs">
            <li role="presentation" id="range-nav-1" class="rnav active"><a>Весь год</a></li>
            <li role="presentation" id="range-nav-new" class="add"><a title="Add new date range">+</a></li>
        </ul>
        
        <div id="range-txt" class="text-center">
            Calendar defining <span id="range-txt-label">every week of year</span>.
            <button type="button" id="range-edit" class="btn btn-default" aria-label="Edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
            <button type="button" id="range-delete" class="btn btn-danger" aria-label="Remove"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
        </div>
        
        <div id="calendar"></div>
    </div>
</div>

<!-- Range selector modal -->
<div id="modal-range" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Временной промежуток</h4>
            </div>
            <div class="modal-body">
                <ul id="modal-range-nav" class="nav nav-pills">
                    <li role="presentation" id="modal-range-nav-always" class="active">
                        <a data-date-range-view="always">Весь год</a>
                    </li>
                    <li role="presentation" id="modal-range-nav-month">
                        <a data-date-range-view="month">Месяц</a>
                    </li>
                    <li role="presentation" id="modal-range-nav-week">
                        <a data-date-range-view="week">Неделя</a>
                    </li>
                    <li role="presentation" id="modal-range-nav-day">
                        <a data-date-range-view="day">День</a>
                    </li>
                    <li role="presentation" id="modal-range-nav-holiday">
                        <a data-date-range-view="holiday">Праздники</a>
                    </li>
                </ul>
                <div id="modal-range-alert" class="alert alert-danger text-left" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Ошибка:</span> <span id="modal-range-alert-label"></span>
                </div>
                <form id="modal-range-form" class="form-horizontal">
                    <div id="range-always">
                        <p class="text-info">Часы работы на каждую неделю в году</p>
                    </div>
                    <div id="range-month">
                        <p class="text-info">Конечный месяц необязателен</p>
                        <div class="form-group">
                            <label for="range-month-start" class="col-sm-2 control-label">Начало</label>
                            <div class="col-sm-10">
                                <select class="form-control input-sm" id="range-month-start">
                                    <option value="1">Январь</option>
                                    <option value="2">Февраль</option>
                                    <option value="3">Март</option>
                                    <option value="4">Апрель</option>
                                    <option value="5">Май</option>
                                    <option value="6">Июнь</option>
                                    <option value="7">Июль</option>
                                    <option value="8">Август</option>
                                    <option value="9">Сенятбрь</option>
                                    <option value="10">Октябрь</option>
                                    <option value="11">Ноябрь</option>
                                    <option value="12">Декабрь</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="range-month-end" class="col-sm-2 control-label">Конец</label>
                            <div class="col-sm-10">
                                <select class="form-control input-sm" id="range-month-end">
                                    <option value="0" selected></option>
                                    <option value="1">Январь</option>
                                    <option value="2">Февраль</option>
                                    <option value="3">Март</option>
                                    <option value="4">Апрель</option>
                                    <option value="5">Май</option>
                                    <option value="6">Июнь</option>
                                    <option value="7">Июль</option>
                                    <option value="8">Август</option>
                                    <option value="9">Сенятбрь</option>
                                    <option value="10">Октябрь</option>
                                    <option value="11">Ноябрь</option>
                                    <option value="12">Декабрь</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="range-week">
                        <p class="text-info">Конечная неделя необязательна</p>
                        <div class="form-group">
                            <label for="range-week-start" class="col-sm-2 control-label">Начало</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control input-sm" id="range-week-start" min="1" max="53" step="1" value="1" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="range-week-end" class="col-sm-2 control-label">Конец</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control input-sm" id="range-week-end" min="1" max="53" step="1" />
                            </div>
                        </div>
                    </div>
                    <div id="range-day">
                        <p class="text-info">Конечный день необязателен</p>
                        <div class="form-group">
                            <label for="range-day-startday" class="col-sm-2 control-label">Начало</label>
                            <div class="col-sm-10 input-inline">
                                <input type="number" class="form-control input-sm" id="range-day-startday" min="1" max="31" step="1" />
                                <select class="form-control input-sm" id="range-day-startmonth">
                                    <option value="1">Январь</option>
                                    <option value="2">Февраль</option>
                                    <option value="3">Март</option>
                                    <option value="4">Апрель</option>
                                    <option value="5">Май</option>
                                    <option value="6">Июнь</option>
                                    <option value="7">Июль</option>
                                    <option value="8">Август</option>
                                    <option value="9">Сенятбрь</option>
                                    <option value="10">Октябрь</option>
                                    <option value="11">Ноябрь</option>
                                    <option value="12">Декабрь</option>
                                </select>
                            </div>
                        </div>
                        <div id="range-day-end" class="form-group">
                            <label for="range-day-endday" class="col-sm-2 control-label">Конец</label>
                            <div class="col-sm-10  input-inline">
                                <input type="number" class="form-control input-sm" id="range-day-endday" min="1" max="31" step="1" />
                                <select class="form-control input-sm" id="range-day-endmonth">
                                    <option value="0" selected></option>
                                    <option value="1">Январь</option>
                                    <option value="2">Февраль</option>
                                    <option value="3">Март</option>
                                    <option value="4">Апрель</option>
                                    <option value="5">Май</option>
                                    <option value="6">Июнь</option>
                                    <option value="7">Июль</option>
                                    <option value="8">Август</option>
                                    <option value="9">Сенятбрь</option>
                                    <option value="10">Октябрь</option>
                                    <option value="11">Ноябрь</option>
                                    <option value="12">Декабрь</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="range-holiday">
                        <div class="radio">
                            <label id="range-holiday-sh"><input type="radio" name="range-holiday-type" value="SH" checked /> Школьные каникулы</label>
                            <label id="range-holiday-ph"><input type="radio" name="range-holiday-type" value="PH" /> Праздники</label>
                            <label id="range-holiday-easter"><input type="radio" name="range-holiday-type" value="easter" /> Пасха</label>
                        </div>
                    </div>
                </form>
                <div class="checkbox" id="range-copy">
                    <label><input type="checkbox" id="range-copy-box" /> Перенести часы работы из предыдущего календаря (если возможно)</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="modal-range-valid" class="btn btn-success">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
            </div>
        </div>
    </div>
</div>