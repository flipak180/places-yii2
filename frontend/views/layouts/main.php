<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= $this->render('blocks/header') ?>
<?= $this->render('blocks/topbar') ?>
<main>
    <div class="container">
        <?= $this->render('blocks/top-banner') ?>
        <div class="aside-cont <?= Yii::$app->markup->asidePosition ?>">
            <aside>
                <button class="btn btn-default toggle-aside"><svg width="20" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 15a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1zM0 1a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1zM0 8a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1z" fill="#000"/></svg></button>
                <div class="wrapper">
                    <?php if (Yii::$app->markup->showFilters): ?>
                        <?= $this->render('aside/filters') ?>
                    <?php endif ?>
                    <div class="visible-desktop">
                        <?php foreach (Yii::$app->markup->asideBlocks as $blockName): ?>
                            <?= $this->render('aside/'.$blockName) ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </aside>
            <div class="main-content">
                <?= $content ?>
                <div class="hidden-desktop">
                    <?php foreach (Yii::$app->markup->asideBlocks as $blockName): ?>
                        <?= $this->render('aside/'.$blockName) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->render('blocks/places-map') ?>
<?= $this->render('blocks/footer') ?>
<?= $this->render('modals/_main') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
