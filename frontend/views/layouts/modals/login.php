<?php

/* @var $this yii\web\View */

use frontend\models\forms\LoginForm;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$loginForm = new LoginForm();
?>

<div class="modal" id="login-modal">
    <a class="close" href="">
        <svg width="42" height="42" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M31.113 10.607L10.607 31.113m19.799 0L9.9 10.607" stroke="gray" stroke-width="2"/></svg>
    </a>
    <h3>Вход</h3>
    <hr>
    <p>Через соцсети <small>(рекомендуем для новых покупателей)</small></p>
    <div class="social-links">
        <div>ВКонтакте</div>
        <div>Facebook</div>
        <div>Google</div>
        <div>Почта Mail.Ru</div>
    </div>
    <hr>
    <p>С помощью аккаунта<a class="pull-right popup-link" href="#signup-modal">Создать аккаунт</a></p>
    <?php $form = ActiveForm::begin([
        //'enableAjaxValidation' => true,
        'action' => Url::toRoute(['/site/login']),
    ]); ?>
        <?= $form->field($loginForm, 'email')->textInput(['placeholder' => $loginForm->getAttributeLabel('email')])->label(false) ?>
        <?= $form->field($loginForm, 'password')->passwordInput(['placeholder' => $loginForm->getAttributeLabel('password')])->label(false) ?>
        <?= $form->field($loginForm, 'rules', ['options' => ['class' => 'form-group checkbox-row']])->checkbox([
            'label' => '<span>Я соглашаюсь с <a href="">пользовательским соглашением</a></span>'
        ])->label(false) ?>
        <button class="btn btn-warning btn-upper">Войти</button>
        <a class="btn btn-default btn-upper popup-link" href="#forget-modal">Забыли пароль?</a>
    <?php ActiveForm::end(); ?>
</div>
