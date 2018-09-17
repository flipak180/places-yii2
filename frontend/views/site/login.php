<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\authclient\widgets\AuthChoice;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

                <div class="user-social">
                    <p>Или войти с помощью:</p>
                    <?php $auth_choice = AuthChoice::begin([
                        'baseAuthUrl' => ['site/login-oauth'],
                        'popupMode' => false,
                    ]); ?>
                        <ul>
                            <?php foreach ($auth_choice->clients as $client): ?>
                                <li><?= $auth_choice->clientLink($client, $client->name, ['class' => $client->name.'-icon']) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php AuthChoice::end(); ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
