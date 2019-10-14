<?php

/* @var $this yii\web\View */
/* @var $model common\models\Place */

?>

<div class="box padding place-contacts">
    <h3>Контактная информация</h3>
    <?php if ($model->address): ?>
        <div class="contact-item address">
            <strong><?= $model->city->name ?></strong>
            <span><?= $model->address ?></span>
        </div>
    <?php endif ?>
    <?php if ($model->metro): ?>
        <div class="contact-item metro">
            <strong>Метро</strong>
            <?= implode(', ', $model->getMetroNames()) ?>
        </div>
    <?php endif ?>
    <?php if ($model->phone): ?>
        <div class="contact-item phone">
            <strong>Телефон</strong>
            <span><?= $model->phone ?></span>
        </div>
    <?php endif ?>
    <div class="contact-item open-time">
        <strong>Время работы</strong>
        <span>Пн.-Чт. 11:30-00:00 (Кальяны с 17.00) Пт.-Сб. 11:30-03.00 (Кальяны с 17.00) Вс. выходной</span>
    </div>
    <?php if ($model->website): ?>
        <div class="contact-item website">
            <strong>Вебсайт</strong>
            <span>
                    <?php if ($model->website): ?>
                        <a href="<?= $model->website ?>" target="_blank"><?= $model->website ?></a><br>
                    <?php endif ?>
                    <a href="vk.com/nebo_lounge" target="_blank">vk.com/nebo_lounge</a><br>
                    <a href="instagram.com/nebo_lounge" target="_blank">instagram.com/nebo_lounge</a>
                </span>
        </div>
    <?php endif ?>
</div>
