<?php

/* @var $this yii\web\View */



?>

<div class="header-top">
    <div class="container">
        <div class="city-block"><span>Санкт-Петербург</span>
            <div class="city-list">
                <div class="top-items">
                    <?php foreach (Yii::$app->city->top as $city): ?>
                        <a href=""><?= $city->name ?></a>
                    <?php endforeach; ?>
                </div>
                <div class="items">
                    <?php foreach (array_chunk(Yii::$app->city->other, 19, true) as $citiesChunk): ?>
                        <div>
                            <!-- <span class="letter">А</span> -->
                            <?php foreach ($citiesChunk AS $city): ?>
                                <a href=""><?= $city->name ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="auth-block">
            <a class="popup-link" href="#login-modal">Вход</a>
            <a class="popup-link" href="#signup-modal">Регистрация</a>
        </div>
    </div>
</div>
