<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\authclient\widgets\AuthChoice;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <div class="user-social">
                    <p>Или войти с помощью:</p>
                    <?php $auth_choice = AuthChoice::begin([
                        'baseAuthUrl' => ['site/signup-oauth'],
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
