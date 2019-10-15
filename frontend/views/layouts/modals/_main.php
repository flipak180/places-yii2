<?php

/* @var $this yii\web\View */

?>

<div id="overlay"></div>

<?php if (Yii::$app->user->isGuest): ?>
    <?= $this->render('login') ?>
    <?= $this->render('signup') ?>
    <?= $this->render('forget') ?>
<?php else: ?>
    <?= $this->render('add-review') ?>
<?php endif ?>
