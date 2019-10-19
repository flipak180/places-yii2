<?php

/* @var $this yii\web\View */
/* @var $model common\models\Place */

?>

<div class="reviews">
    <h2>Отзывы посетителей (<?= count($model->activeReviews) ?>)</h2>
    <?php foreach ($model->activeReviews as $review): ?>
        <div class="item">
            <div class="author">
                <img class="responsive" src="/design/img/no-avatar.png" alt="">
                <h4>Роман</h4>
                <p>Критик 1-го уровня</p>
            </div>
            <div class="main">
                <div class="top">
                    <h4><?= $review->name ?></h4>
                    <span class="rating"><?= $review->rating ?></span>
                </div>
                <div class="text">
                    <?= $review->text ?>
                </div>
                <div class="bottom">
                    <small class="date"><?= Yii::$app->formatter->asDate($review->created_at) ?></small>
                    <div class="votes">
                        <a class="vote-down" href="#"></a>
                        <span>+567</span>
                        <a class="vote-up" href="#"></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="flex-row">
        <?php if (!Yii::$app->user->isGuest): ?>
            <a href="#reviews-modal" class="btn btn-warning btn-upper popup-link">Добавить свой отзыв</a>
        <?php endif ?>
        <a href="" class="more">Все отзывы</a>
    </div>
</div>
